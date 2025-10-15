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
    <link rel="stylesheet" href="<?= base('assets/css/chart.umd.min.js') ?>" />

    <style>
        .gap {
            gap: 0.5rem !important;
        }
    </style>

</head>

<body>
    <nav class="navbar fixed-top navbar-default container-fluid" style="background-color: #fff;">
        <div class="d-flex">
            <?php $halamanAktif = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            foreach ($menu as $item) {
                $aktif = (strpos($halamanAktif, $item['url']) === 0); ?>
                <a href="<?= $item['url'] ?>"
                    class="nav-link fw-bold <?= $aktif ? 'bg-info text-dark rounded' : 'text-secondary' ?>">
                    <?= $item['label'] ?>
                </a>
            <?php } ?>
        </div>
        <div>
            <a href="<?= base('logout.php') ?>" class="nav-link text-danger fw-bold">Logout</a>
        </div>
    </nav>
    <div class="border"></div>
    <div class="container-fluid overflow-auto" style="padding-top: 40px;background-color: #ebebeb; min-height: 90vh;">
