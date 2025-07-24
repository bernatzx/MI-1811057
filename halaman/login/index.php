<?php require_once '../../konfigurasi.php' ?>

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
        <div class="mb-3 d-flex align-items-center">
            <div class="form-check me-auto">
                <input class="form-check-input" type="checkbox" id="showPassword">
                <label for="showPassword" class="form-check-label">Show Password</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

    <script>
        document.getElementById('showPassword').addEventListener('change', function () {
            const passwordInput = document.getElementById('password');
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        })
    </script>
</body>

</html>