<?php
require_once '../../konfigurasi.php';
if (VALID()) {
    echo "<script>window.location='" . base() . "'</script>";
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = trim(mysqli_real_escape_string($hub, $_POST['username']));
        $password = sha1(trim(mysqli_real_escape_string($hub, $_POST['password'])));
        $sql = mysqli_query($hub, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'") or die(mysqli_error($hub));
        if (mysqli_num_rows($sql) > 0) {
            $_SESSION['valid'] = true;
            $_SESSION['data'] = mysqli_fetch_assoc($sql);
            echo "<script>window.location='" . base() . "'</script>";
            exit();
        } else {
            $pesanerror = 'Username atau password salah!';
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem</title>
    <link rel="stylesheet" href="<?= base('assets/css/bootstrap.min.css') ?>" />
</head>

<body class="d-flex justify-content-center align-items-center">
    <form method="post" class="col-4 m-auto">
        <div class="mb-3 fs-1 fw-bold">
            Login
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" name="username" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <?php if (isset($pesanerror)) {
            echo "
                <div class='mb-3 bg-danger text-white p-2 rounded d-flex justify-content-between align-items-center'>
                    <div>$pesanerror</div>
                    <div><i class='fas fa-warning'></i></div>
                </div>
            ";
        } ?>
        <div class="mb-3 d-flex align-items-center">
            <div class="form-check me-auto">
                <input class="form-check-input" type="checkbox" id="showPassword">
                <label for="showPassword" class="form-check-label">Show Password</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

    <script src="<?= base('assets/js/all.min.js') ?>"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById('showPassword').addEventListener('change', function () {
                const passwordInput = document.getElementById('password');
                passwordInput.type = this.checked ? 'text' : 'password';
            });
        });
    </script>
</body>

</html>