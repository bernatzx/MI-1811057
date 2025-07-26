<?php include_once '../../header.php' ?>
<div class="col-8 m-auto p-4" style="background-color: #fff;">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4>Hasil</h4>
        </div>
    </div>
    <div class="mb-4">
        <div class="mb-3">
            <span class="fw-bold">Penilaian Deskriptif</span>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <?php
                        $sql_k = mysqli_query($hub, "SELECT * FROM tb_kriteria ORDER BY id_kriteria") or die(mysqli_error($hub));
                        $list_k = [];
                        while ($baris_k = mysqli_fetch_assoc($sql_k)) {
                            $list_k[] = $baris_k;
                            echo "<th>$baris_k[nama_kriteria]</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_a = mysqli_query($hub, "SELECT * FROM tb_alternatif") or die(mysqli_error($hub));
                    while ($baris_a = mysqli_fetch_assoc($sql_a)) {
                        echo "<tr><td>$baris_a[nama_alternatif]</td>";
                        foreach ($list_k as $k) {
                            $q = mysqli_query($hub, "SELECT s.nama_subkriteria FROM tb_penilaian p JOIN tb_subkriteria s ON p.id_subkriteria = s.id_subkriteria WHERE p.id_alternatif = '$baris_a[id_alternatif]' AND p.id_kriteria = '$k[id_kriteria]'") or die(mysqli_error($hub));
                            $s = mysqli_fetch_assoc($q);
                            echo "<td>" . ($s['nama_subkriteria'] ?? '-') . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mb-4">
        <div class="mb-3">
            <span class="fw-bold">Penilaian Numerik</span>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <?php
                        foreach ($list_k as $k) {
                            echo "<th>$k[nama_kriteria]</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_a = mysqli_query($hub, "SELECT * FROM tb_alternatif") or die(mysqli_error($hub));
                    while ($baris_a = mysqli_fetch_assoc($sql_a)) {
                        echo "<tr><td>$baris_a[nama_alternatif]</td>";
                        foreach ($list_k as $k) {
                            $q = mysqli_query($hub, "SELECT s.nilai_subkriteria FROM tb_penilaian p JOIN tb_subkriteria s ON p.id_subkriteria = s.id_subkriteria WHERE p.id_alternatif = '$baris_a[id_alternatif]' AND p.id_kriteria = '$k[id_kriteria]'") or die(mysqli_error($hub));
                            $s = mysqli_fetch_assoc($q);
                            echo "<td>" . ($s['nilai_subkriteria'] ?? '-') . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mb-4">
        <div class="mb-3">
            <span class="fw-bold">Normalisasi Bobot</span>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <th>Bobot</th>
                        <th>Perhitungan</th>
                        <th>Bobot Ternormalisasi (w<sub>j</sub>)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $bobot_kriteria = [];
                    $total_bobot = 0;

                    foreach ($list_k as $k) {
                        $total_bobot += $k['bobot_kriteria'];
                    }

                    foreach ($list_k as $k) {
                        $w = $k['bobot_kriteria'] / $total_bobot;
                        $bobot_kriteria[$k['id_kriteria']] = [
                            'nama' => $k['nama_kriteria'],
                            'bobot' => $w,
                            'sifat' => $k['sifat_kriteria']
                        ]; ?>
                        <tr>
                            <td><?= $k['nama_kriteria'] ?></td>
                            <td><?= $k['bobot_kriteria'] ?></td>
                            <td><?= $k['bobot_kriteria'] ?>/<?= $total_bobot ?></td>
                            <td><?= round($w, 2) ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mb-4">
        <hr>
        <div class="mb-3">
            <span class="fw-bold">Perhitungan Vektor S</span>
        </div>
        <?php
        $alternatif = [];
        $q_alt = mysqli_query($hub, "SELECT * FROM tb_alternatif");
        $counter = 1;
        while ($a = mysqli_fetch_assoc($q_alt)) {
            $cek = mysqli_query($hub, "SELECT COUNT(*) as jumlah FROM tb_penilaian WHERE id_alternatif = '{$a['id_alternatif']}'");
            $c = mysqli_fetch_assoc($cek);
            if ((int) $c['jumlah'] !== count($list_k))
                continue;
            $id = $a['id_alternatif'];
            $nama = $a['nama_alternatif'];
            $s = 1;
            $faktor_html = [];
            $hasil_pangkat = [];
            foreach ($list_k as $k) {
                $q = mysqli_query($hub, "
            SELECT s.nilai_subkriteria
            FROM tb_penilaian p
            JOIN tb_subkriteria s ON p.id_subkriteria = s.id_subkriteria
            WHERE p.id_alternatif = '$id' AND p.id_kriteria = '{$k['id_kriteria']}'
        ");
                $row = mysqli_fetch_assoc($q);
                $x = $row['nilai_subkriteria'] ?? 1;
                $w = $bobot_kriteria[$k['id_kriteria']]['bobot'];
                $sifat = $bobot_kriteria[$k['id_kriteria']]['sifat'];
                if ($sifat === 'cost')
                    $w *= -1;

                $hasil = pow($x, $w);
                $s *= $hasil;
                $faktor_html[] = "({$x})<sup>" . round($w, 2) . "</sup>";
                $hasil_pangkat[] = round($hasil, 3);
            }
            $alternatif[] = [
                'nama' => $nama,
                'nilai_s' => $s,
                'urutan' => $counter
            ];
            echo "<p><strong>S<sub>{$counter}</sub></strong> = " . implode(" × ", $faktor_html);
            echo " = " . implode(" × ", $hasil_pangkat);
            echo " = <strong>" . round($s, 3) . "</strong></p>";

            $counter++;
        } ?>
    </div>
    <div class="mb-4">
        <hr>
        <div class="mb-3">
            <span class="fw-bold">Total Vektor S</span>
        </div>
        <?php
        $total_s = array_sum(array_column($alternatif, 'nilai_s'));
        echo "<p><strong>ΣS</strong> = ";
        echo implode(" + ", array_map(fn($a) => round($a['nilai_s'], 3), $alternatif));
        echo " = <strong>" . round($total_s, 3) . "</strong></p><hr>";
        ?>
    </div>
    <div class="mb-4">
        <div class="mb-3">
            <span class="fw-bold">Perhitungan Vektor V</span>
        </div>
        <?php
        foreach ($alternatif as &$alt) {
            $alt['nilai_v'] = $alt['nilai_s'] / $total_s;
            echo "<p><strong>V<sub>{$alt['urutan']}</sub></strong> = " . round($alt['nilai_s'], 3) . " / " . round($total_s, 3) . " = <strong>" . round($alt['nilai_v'], 3) . "</strong></p>";
        }
        unset($alt);
        ?>
    </div>
    <hr>


    <?php
    $alternatif = [];
    $q_alt = mysqli_query($hub, "SELECT * FROM tb_alternatif");
    while ($a = mysqli_fetch_assoc($q_alt)) {
        $q_jml = mysqli_query($hub, "SELECT COUNT(*) as jumlah FROM tb_penilaian WHERE id_alternatif = '{$a['id_alternatif']}'");
        $cek = mysqli_fetch_assoc($q_jml);
        $jml_kriteria = count($list_k);
        if ((int) $cek['jumlah'] === $jml_kriteria) {
            $alternatif[$a['id_alternatif']] = [
                'nama' => $a['nama_alternatif'],
                'nilai' => 1
            ];
        }
    }
    $total_bobot = 0;
    $q_bobot = mysqli_query($hub, "SELECT bobot_kriteria FROM tb_kriteria");
    while ($b = mysqli_fetch_assoc($q_bobot)) {
        $total_bobot += $b['bobot_kriteria'];
    }
    $q = mysqli_query($hub, "
    SELECT 
        p.id_alternatif,
        k.bobot_kriteria,
        k.sifat_kriteria,
        s.nilai_subkriteria
    FROM tb_penilaian p
    JOIN tb_kriteria k ON p.id_kriteria = k.id_kriteria
    JOIN tb_subkriteria s ON p.id_subkriteria = s.id_subkriteria
    ");
    while ($row = mysqli_fetch_assoc($q)) {
        $id_alt = $row['id_alternatif'];
        $bobot = $row['bobot_kriteria'] / $total_bobot;
        $nilai = $row['nilai_subkriteria'];
        if ($row['sifat_kriteria'] == 'cost') {
            $bobot *= -1;
        }
        $alternatif[$id_alt]['nilai'] *= pow($nilai, $bobot);
    }
    $total_S = 0;
    foreach ($alternatif as $alt) {
        $total_S += $alt['nilai'];
    }
    foreach ($alternatif as $id => &$alt) {
        $alt['vektor_v'] = $alt['nilai'] / $total_S;
    }
    unset($alt);
    usort($alternatif, function ($a, $b) {
        return $b['vektor_v'] <=> $a['vektor_v'];
    });
    ?>
    <div class="mb-4">
        <div class="mb-3">
            <span>Perangkingan</span>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Alternatif</th>
                        <th>Nilai Akhir</th>
                        <th>Rangking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rank = 1;
                    foreach ($alternatif as $alt) {
                        echo "<tr>
                        <td>{$alt['nama']}</td>
                        <td>" . round($alt['vektor_v'], 3) . "</td>
                        <td>{$rank}</td>
                    </tr>";
                        $rank++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../../footer.php' ?>