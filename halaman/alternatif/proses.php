<?php
require_once '../../konfigurasi.php';
if (!VALID()) {
    echo "<script>window.location='" . base() . "'</script>";
}
if ($_SERVER['REQUEST_METHOD']) {
    if (isset($_POST['tambah'])) {
        $alternatif = trim(mysqli_real_escape_string($hub, $_POST['alternatif']));
        mysqli_query($hub, "INSERT INTO tb_alternatif (nama_alternatif) VALUES ('$alternatif')") or die(mysqli_error($hub));
        echo "<script>window.location='index.php'</script>";
        exit();
    } elseif (isset($_POST['ubah'])) {
        $id = trim(mysqli_real_escape_string($hub, $_POST['id']));
        $alternatif = trim(mysqli_real_escape_string($hub, $_POST['alternatif']));
        mysqli_query($hub, "UPDATE tb_alternatif SET nama_alternatif = '$alternatif' WHERE id_alternatif = '$id'") or die (mysqli_error($hub));
        echo "<script>window.location='index.php'</script>";
        exit();
    }
}