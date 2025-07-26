<?php include_once '../../header.php';
$id_alternatif = $_GET['id'] ?? null;
if (!$id_alternatif) {
    echo "<script>alert('Alternatif tidak ditemukan'); window.location.href='index.php';</script>";
    exit();
}
$sql = mysqli_query($hub, "SELECT * FROM tb_alternatif WHERE id_alternatif = '$id_alternatif'") or die(mysqli_error($hub));
$alter = mysqli_fetch_assoc($sql);
?>
<div class="col-8 m-auto p-4" style="background-color: #fff;">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4>Beri Penilaian</h4>
        </div>
        <div>
            <a href="<?= base('halaman/penilaian/') ?>"
                class="d-flex align-items-center gap btn btn-sm btn-outline-secondary"><i
                    class="fas fa-arrow-left"></i>Kembali</a>
        </div>
    </div>
    <div class="border mb-3"></div>
    <div>
        <div class="d-flex align-items-center mb-2">
            <label class="col-4">Alternatif</label>
            <h5><?=$alter['nama_alternatif']?></h5>
        </div>
        <form action="proses.php" method="post">
            <input type="hidden" name="id_alternatif" value="<?= $id_alternatif ?>">
            <?php
            $sql_k = mysqli_query($hub, "SELECT * FROM tb_kriteria") or die(mysqli_error($hub));
            while ($baris_k = mysqli_fetch_assoc($sql_k)) { ?>
                <input type="hidden" name="id_kriteria[]" value="<?= $baris_k['id_kriteria'] ?>">
                <div class="d-flex align-items-center mb-2">
                    <label class="col-4"><?= $baris_k['nama_kriteria'] ?></label>
                    <select name="id_subkriteria[]" class="form-control w-100" required>
                        <option value="" disabled selected>Pilih</option>
                        <?php
                        $sql_s = mysqli_query($hub, "SELECT * FROM tb_subkriteria WHERE id_kriteria = '$baris_k[id_kriteria]'") or die(mysqli_error($hub));
                        while ($baris_s = mysqli_fetch_assoc($sql_s)) {
                            echo "<option value='$baris_s[id_subkriteria]'>$baris_s[nama_subkriteria]</option>";
                        }
                        ?>
                    </select>
                </div>
            <?php } ?>
            <div class="d-flex align-items-center mb-2">
                <div class="col-4"></div>
                <input class="btn btn-sm btn-success w-100" type="submit" value="Beri Nilai" name="berinilai" />
            </div>
        </form>
    </div>
</div>
<?php include_once '../../footer.php' ?>