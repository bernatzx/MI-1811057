<?php include_once '../../header.php';
$id = @$_GET['id'];
$sql = mysqli_query($hub, "SELECT s.*, k.nama_kriteria FROM tb_subkriteria s JOIN tb_kriteria k ON s.id_kriteria = k.id_kriteria WHERE id_subkriteria = '$id'") or die(mysqli_error($hub));
$row = mysqli_fetch_assoc($sql);
?>
<div class="col-8 m-auto p-4" style="background-color: #fff;">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4>Ubah Subkriteria</h4>
        </div>
        <div>
            <a href="<?= base('halaman/subkriteria/') ?>"
                class="d-flex align-items-center gap btn btn-sm btn-outline-secondary"><i
                    class="fas fa-arrow-left"></i>Kembali</a>
        </div>
    </div>
    <div class="border mb-3"></div>
    <div>
        <form action="proses.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="d-flex align-items-center mb-2">
                <label class="col-4" for="kriteria">Kriteria</label>
                <input value="<?= $row['nama_kriteria'] ?>" class="form-control w-100" name="kriteria" id="kriteria"
                    type="text" disabled>
            </div>
            <div class="d-flex align-items-center mb-2">
                <label class="col-4" for="subkriteria">Subkriteria</label>
                <input value="<?= $row['nama_subkriteria'] ?>" class="form-control w-100" name="subkriteria" id="subkriteria"
                    type="text" required>
            </div>
            <div class="d-flex align-items-center mb-2">
                <label class="col-4" for="nilai">Nilai</label>
                <input value="<?= $row['nilai_subkriteria'] ?>" class="form-control w-100" name="nilai" id="nilai"
                    type="number" required>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="col-4"></div>
                <input class="btn btn-sm btn-success w-100" type="submit" value="Ubah" name="ubah" />
            </div>
        </form>
    </div>
</div>
<?php include_once '../../footer.php' ?>