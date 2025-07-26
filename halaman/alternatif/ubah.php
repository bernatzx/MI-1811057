<?php include_once '../../header.php';
$id = @$_GET['id'];
$sql = mysqli_query($hub, "SELECT * FROM tb_alternatif WHERE id_alternatif = '$id'") or die(mysqli_error($hub));
$row = mysqli_fetch_assoc($sql);
?>
<div class="col-8 m-auto p-4" style="background-color: #fff;">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4>Ubah Alternatif</h4>
        </div>
        <div>
            <a href="<?= base('halaman/alternatif/') ?>"
                class="d-flex align-items-center gap btn btn-sm btn-outline-secondary"><i
                    class="fas fa-arrow-left"></i>Kembali</a>
        </div>
    </div>
    <div class="border mb-3"></div>
    <div>
        <form action="proses.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="d-flex align-items-center mb-2">
                <label class="col-4" for="alternatif">Alternatif</label>
                <input value="<?= $row['nama_alternatif'] ?>" class="form-control w-100" name="alternatif" id="alternatif"
                    type="text" required>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="col-4"></div>
                <input class="btn btn-sm btn-success w-100" type="submit" value="Ubah" name="ubah" />
            </div>
        </form>
    </div>
</div>
<?php include_once '../../footer.php' ?>