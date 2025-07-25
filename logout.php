<?php
require_once 'konfigurasi.php';
session_unset();
session_destroy();
echo "<script>window.location='".base()."'</script>";
exit();