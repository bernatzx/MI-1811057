<?php include_once '../../header.php' ?>
<div class="col-8 m-auto p-4" style="background-color: #fff;">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4>Tambah Alternatif</h4>
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
            <div class="d-flex align-items-center mb-2">
                <label class="col-4" for="alternatif">Alternatif</label>
                <input class="form-control w-100" name="alternatif" id="alternatif" type="text" required>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="col-4"></div>
                <input class="btn btn-sm btn-success w-100" type="submit" value="Tambah" name="tambah" />
            </div>
        </form>
    </div>
</div>
<?php include_once '../../footer.php' ?>