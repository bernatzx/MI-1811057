<?php include_once '../../header.php' ?>
<div class="col-8 m-auto p-4" style="background-color: #fff; height: 90vh;">
    <?php

    $sql_k = mysqli_query($hub, "SELECT * FROM tb_kriteria ORDER BY id_kriteria") or die(mysqli_error($hub));
    $list_k = [];
    while ($baris_k = mysqli_fetch_assoc($sql_k)) {
        $list_k[] = $baris_k;
    }

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

    // ambil 5 data alternatif teratas
    $top_alternatif = array_slice($alternatif, 0, 5);

    // siapkan data untuk Chart.js
    $labels = [];
    $data = [];
    foreach ($top_alternatif as $alt) {
        $labels[] = $alt['nama'];
        $data[] = round($alt['vektor_v'], 3);
    }

    $namaAsli = array_column($top_alternatif, 'nama'); // nama asli
    $labels = ['A', 'B', 'C', 'D', 'E'];
    ?>

    <div class="mb-3">
        <div>
            <h4>Grafik</h4>
        </div>
        <div style="text-align: justify;">
            <small>
                Grafik ini menampilkan gambaran jelas mengenai kepuasan pelanggan di
                berbagai Indomaret. Indomaret Salero memimpin dengan nilai akhir tertinggi, menandakan tingkat kepuasan
                yang
                paling konsisten dan tinggi di antara seluruh gerai yang dianalisis. Disusul oleh Indomaret Kota Baru
                dan
                Indomaret Bastiong 2, yang meskipun nilainya sedikit lebih rendah, tetap menunjukkan respons positif
                dari
                pelanggan. Sementara Indomaret Jambula dan Indomaret Jati 2 menempati posisi keempat dan kelima, grafik
                menunjukkan bahwa meskipun ada ruang untuk peningkatan, tingkat kepuasan mereka masih cukup signifikan.
            </small>
        </div>
    </div>
    <div class="legend-mapping mb-2" style="font-size: 12px;">
        <?php foreach ($labels as $i => $label): ?>
            <span><strong><?= $label ?></strong> → <?= $namaAsli[$i] ?></span><br>
        <?php endforeach; ?>
    </div>

    <canvas id="rankingChart" width="400" height="140"></canvas>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('rankingChart').getContext('2d');

            // Data dinamis dari PHP
            const namaAsli = <?php echo json_encode(array_column($top_alternatif, 'nama')); ?>;
            const values = <?php echo json_encode($data); ?>;

            // Label ringkas untuk X-axis: A, B, C, D, E
            const labels = ['A', 'B', 'C', 'D', 'E'];

            // Warna batang bisa berbeda per alternatif
            const colors = [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)'
            ];
            const borderColors = [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ];

            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels, // X-axis ringkas
                    datasets: [{
                        label: 'Top 5 Alternatif', // Legend
                        data: values,
                        backgroundColor: colors,
                        borderColor: borderColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                // Tooltip menampilkan nama asli + nilai
                                label: function (context) {
                                    const idx = context.dataIndex;
                                    return namaAsli[idx] + ': ' + context.raw;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

</div>
<?php include_once '../../footer.php' ?>

