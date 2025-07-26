<?php include_once '../../header.php' ?>
<div class="col-8 m-auto p-4" style="background-color: #fff;">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4>Hasil</h4>
        </div>
    </div>
    <div class="mb-4">
        <div class="mb-3">
            <span>Penilaian Deskriptif</span>
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
            <span>Penilaian Numerik</span>
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
</div>
<?php include_once '../../footer.php' ?>