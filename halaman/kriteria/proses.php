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
        $cek = mysqli_query($hub, "SELECT * FROM tb_kriteria WHERE nama_kriteria = '$kriteria'") or die (mysqli_error($hub));
        if (mysqli_num_rows($cek) > 0) {
            echo "<script>alert('Kriteria dengan nama tersebut sudah ada!'); window.location='tambah.php'</script>";
            exit();
        } else {
            mysqli_query($hub, "INSERT INTO tb_kriteria (nama_kriteria, bobot_kriteria, sifat_kriteria) VALUES ('$kriteria', '$bobot', '$sifat')") or die(mysqli_error($hub));
            echo "<script>window.location='index.php'</script>";
            exit();
        }
    } elseif (isset($_POST["ubah"])) {
        $id = trim(mysqli_real_escape_string($hub, $_POST['id']));
        $kriteria = trim(mysqli_real_escape_string($hub, $_POST['kriteria']));
        $bobot = trim(mysqli_real_escape_string($hub, $_POST['bobot']));
        $sifat = trim(mysqli_real_escape_string($hub, $_POST['sifat']));
        mysqli_query($hub, "UPDATE tb_kriteria SET nama_kriteria = '$kriteria', bobot_kriteria = '$bobot', sifat_kriteria = '$sifat' WHERE id_kriteria = '$id'") or die(mysqli_error($hub));
        echo "<script>window.location='index.php'</script>";
        exit();
    }
}