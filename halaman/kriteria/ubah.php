<?php include_once '../../header.php';
$id = @$_GET['id'];
$sql = mysqli_query($hub, "SELECT * FROM tb_kriteria WHERE id_kriteria = '$id'") or die(mysqli_error($hub));
$row = mysqli_fetch_assoc($sql);
?>
<div class="col-8 m-auto p-4" style="background-color: #fff;">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4>Ubah Kriteria</h4>
        </div>
        <div>
            <a href="<?= base('halaman/kriteria/') ?>"
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
                    type="text" required>
            </div>
            <div class="d-flex align-items-center mb-2">
                <label class="col-4" for="bobot">Bobot</label>
                <input value="<?= $row['bobot_kriteria'] ?>" class="form-control w-100" name="bobot" id="bobot"
                    type="number" required>
            </div>
            <div class="d-flex align-items-center mb-2">
                <label class="col-4" for="sifat">Sifat Kriteria</label>
                <select name="sifat" id="sifat" class="form-control w-100" required>
                    <option value="<?= $row['sifat_kriteria'] ?>" selected><?= ucfirst($row['sifat_kriteria']) ?>
                    </option>
                    <?php if ($row['sifat_kriteria'] == 'cost'): ?>
                        <option value="benefit">Benefit</option>
                    <?php elseif ($row['sifat_kriteria'] == 'benefit'): ?>
                        <option value="cost">Cost</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="col-4"></div>
                <input class="btn btn-sm btn-success w-100" type="submit" value="Ubah" name="ubah" />
            </div>
        </form>
    </div>
</div>
<?php include_once '../../footer.php' ?>