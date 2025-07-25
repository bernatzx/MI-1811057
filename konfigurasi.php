<?php
session_start();

$hub = mysqli_connect('localhost', 'root', '', 'db_maryani');
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

function base($url = null)
{
    $base = 'http://localhost/spk-maryani';
    if($url != null) {
        return $base . '/' . $url;
    } else {
        return $base;
    }
}

$menu = [
    ['label' => 'Dashboard', 'url' => base('halaman/dashboard/')],
    ['label' => 'Kriteria', 'url' => base('halaman/kriteria/')],
    ['label' => 'Subkriteria', 'url' => base('halaman/subkriteria/')],
    ['label' => 'Alternatif', 'url' => base('halaman/alternatif/')],
    ['label' => 'Penilaian', 'url' => base('halaman/penilaian/')],
    ['label' => 'Hasil', 'url' => base('halaman/hasil/')]
];

function VALID()
{
    return isset($_SESSION['valid']) && $_SESSION['valid'] === true;
}