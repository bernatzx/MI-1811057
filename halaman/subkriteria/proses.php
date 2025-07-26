<?php
require_once '../../konfigurasi.php';
if (!VALID()) {
    echo "<script>window.location='" . base() . "'</script>";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tambah'])) {
        $id_kriteria = trim(mysqli_escape_string($hub, $_POST['id_kriteria']));
        $subkriteria = trim(mysqli_escape_string($hub, $_POST['subkriteria']));
        $nilai = trim(mysqli_escape_string($hub, $_POST['nilai']));
        mysqli_query($hub, "INSERT INTO tb_subkriteria (id_kriteria, nama_subkriteria, nilai_subkriteria) VALUES ('$id_kriteria', '$subkriteria', '$nilai')") or die(mysqli_error($hub));
        echo "<script>window.location='index.php'</script>";
        exit();
    }
}