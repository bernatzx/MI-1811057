<?php
require_once '../../konfigurasi.php';
if (!VALID()) {
    echo "<script>window.location='" . base() . "'</script>";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['berinilai'])) {
        $id_alternatif = $_POST['id_alternatif'];
        $id_kriteria = $_POST['id_kriteria'];
        $id_subkriteria = $_POST['id_subkriteria'];
        mysqli_query($hub, "DELETE FROM tb_penilaian WHERE id_alternatif = '$id_alternatif'") or die(mysqli_error($hub));
        for ($i = 0; $i < count($id_kriteria); $i++) {
            $k = $id_kriteria[$i];
            $s = $id_subkriteria[$i];
            mysqli_query($hub, "INSERT INTO tb_penilaian (id_kriteria, id_subkriteria, id_alternatif) VALUES ('$k', '$s', '$id_alternatif')") or die(mysqli_error($hub));
        }
        echo "<script>alert('Penilaian Berhasil Disimpan!'); window.location='index.php'</script>";
    }
}