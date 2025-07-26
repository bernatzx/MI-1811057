<?php include_once '../../header.php' ?>
<div class="col-8 m-auto p-4" style="background-color: #fff;">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4>Tambah Subkriteria</h4>
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
            <div class="d-flex align-items-center mb-2">
                <label class="col-4" for="id_kriteria">Kriteria</label>
                <select name="id_kriteria" id="id_kriteria" class="form-control w-100" required>
                    <option value="" disabled selected>Pilih</option>
                    <?php
                    $sql_k = mysqli_query($hub, "SELECT * FROM tb_kriteria") or die (mysqli_error($hub));
                    if (mysqli_num_rows($sql_k) > 0) {
                        while ($row = mysqli_fetch_assoc($sql_k)) {
                            echo "<option value='$row[id_kriteria]'>$row[nama_kriteria]</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="d-flex align-items-center mb-2">
                <label class="col-4" for="subkriteria">Subkriteria</label>
                <input class="form-control w-100" name="subkriteria" id="subkriteria" type="text" required>
            </div>
            <div class="d-flex align-items-center mb-2">
                <label class="col-4" for="nilai">Nilai</label>
                <input class="form-control w-100" name="nilai" id="nilai" type="number" required>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="col-4"></div>
                <input class="btn btn-sm btn-success w-100" type="submit" value="Tambah" name="tambah" />
            </div>
        </form>
    </div>
</div>
<?php include_once '../../footer.php' ?>