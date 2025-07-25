<?php
require_once '../../konfigurasi.php';
if (!VALID()) {
    echo "<script>window.location='" . base() . "'</script>";
    exit();
} else {
    mysqli_query($hub, "DELETE FROM tb_kriteria WHERE id_kriteria = '$_GET[id]'") or die (mysqli_error($hub));
    echo "<script>window.location='index.php'</script>";
    exit();
}