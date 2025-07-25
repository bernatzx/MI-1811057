<?php
require_once '../../konfigurasi.php';
if (!VALID()) {
    echo "<script>window.location='" . base() . "'</script>";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["tambah"])) {
        $kriteria = trim(mysqli_real_escape_string($hub, $_POST['kriteria']));
        $bobot = trim(mysqli_real_escape_string($hub, $_POST['bobot']));
        $sifat = trim(mysqli_real_escape_string($hub, $_POST['sifat']));
        mysqli_query($hub, "INSERT INTO tb_kriteria (nama_kriteria, bobot_kriteria, sifat_kriteria) VALUES ('$kriteria', '$bobot', '$sifat')") or die (mysqli_error($hub));
        echo "<script>window.location='index.php'</script>";
    }
}