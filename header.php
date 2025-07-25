<?php require_once 'konfigurasi.php';
if (!VALID()) {
    echo "<script>window.location='" . base() . "'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendukung Keputusan</title>
    <link rel="stylesheet" href="<?= base('assets/css/bootstrap.min.css') ?>" />
</head>

<body>
    <nav class="navbar navbar-default container-fluid">
        <div class="d-flex">
            <?php $halamanAktif = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            foreach ($menu as $item) {
                $aktif = (strpos($halamanAktif, $item['url']) === 0); ?>
                <a href="<?= $item['url'] ?>" class="nav-link fw-bold <?= $aktif ? 'bg-info text-dark rounded' : 'text-secondary' ?>">
                    <?= $item['label'] ?>
                </a>
            <?php } ?>
        </div>
        <div>
            <a href="<?= base('logout.php') ?>" class="nav-link text-danger fw-bold">Logout</a>
        </div>
    </nav>
    <div class="border"></div>
    <div class="container-fluid overflow-auto" style="background-color: #ebebeb; min-height: 90vh;">
            