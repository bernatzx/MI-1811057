<?php
require_once '../../konfigurasi.php';
if (!VALID()) {
    echo "<script>window.location='" . base() . "'</script>";
}

if ($_SERVER['REQUEST_METHOD']) {
    if (isset($_POST['tambah'])) {
        $alternatif = trim(mysqli_real_escape_string($hub, $_POST['alternatif']));

        $cek = mysqli_query($hub, "SELECT nama_alternatif FROM tb_alternatif WHERE nama_alternatif LIKE '{$alternatif}%'")
            or die(mysqli_error($hub));

        if (mysqli_num_rows($cek) > 0) {
            $maxIncrement = 0;
            while ($row = mysqli_fetch_assoc($cek)) {
                $nama = $row['nama_alternatif'];
                if (preg_match('/^' . preg_quote($alternatif, '/') . '\s+(\d+)$/', $nama, $matches)) {
                    $num = (int) $matches[1];
                    if ($num > $maxIncrement) {
                        $maxIncrement = $num;
                    }
                } elseif ($nama === $alternatif && $maxIncrement == 0) {
                    $maxIncrement = 0;
                }
            }
            $baru = $alternatif . " " . ($maxIncrement + 1);
        } else {
            $baru = $alternatif;
        }

        mysqli_query($hub, "INSERT INTO tb_alternatif (nama_alternatif) VALUES ('$baru')")
            or die(mysqli_error($hub));

        echo "<script>window.location='index.php'</script>";
        exit();

    } elseif (isset($_POST['ubah'])) {
        $id = trim(mysqli_real_escape_string($hub, $_POST['id']));
        $alternatif = trim(mysqli_real_escape_string($hub, $_POST['alternatif']));

        mysqli_query($hub, "UPDATE tb_alternatif SET nama_alternatif = '$alternatif' WHERE id_alternatif = '$id'")
            or die(mysqli_error($hub));

        echo "<script>window.location='index.php'</script>";
        exit();
    }
}
