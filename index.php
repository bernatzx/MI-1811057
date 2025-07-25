<?php
require_once 'konfigurasi.php';
if (!VALID()) { ?>
    <script>window.location = '<?= base('halaman/login/') ?>'</script>
<?php } else { ?>
    <script>window.location = '<?= base('halaman/dashboard/') ?>'</script>
<?php } ?>