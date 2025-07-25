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

function VALID()
{
    return isset($_SESSION['valid']) && $_SESSION['valid'] === true;
}