<?php
require_once '../../konfigurasi.php';
if (!VALID()) {
    echo "<script>window.location='" . base() . "'</script>";
    exit();
} else {
    mysqli_query($hub, "DELETE FROM tb_subkriteria WHERE id_subkriteria = '$_GET[id]'") or die (mysqli_error($hub));
    echo "<script>window.location='index.php'</script>";
    exit();
}