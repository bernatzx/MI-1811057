<?php include_once '../../header.php' ?>
<div class="col-8 m-auto p-4" style="background-color: #fff;">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4>Subkriteria</h4>
        </div>
        <div class="d-flex align-items-center gap">
            <div>
                <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-refresh"></i></a>
            </div>
            <div>
                <a href="tambah.php" class="d-flex align-items-center gap btn btn-sm btn-success"><i
                        class="fas fa-plus"></i>Tambah Subkriteria</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID Subkriteria</th>
                    <th>Kriteria</th>
                    <th>Subkriteria</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($hub, 'SELECT s.*, k.nama_kriteria FROM tb_subkriteria s JOIN tb_kriteria k ON s.id_kriteria = k.id_kriteria') or die(mysqli_error($hub));
                if (mysqli_num_rows($sql) > 0) {
                    while ($row = mysqli_fetch_assoc($sql)) { ?>
                        <tr>
                            <td><?= $row['id_subkriteria'] ?></td>
                            <td><?= $row['nama_kriteria'] ?></td>
                            <td><?= $row['nama_subkriteria'] ?></td>
                            <td><?= $row['nilai_subkriteria'] ?></td>
                            <td class="d-flex gap">
                                <a href="ubah.php?id=<?= $row['id_subkriteria'] ?>"
                                    class="gap d-flex align-items-center btn btn-outline-info btn-sm"><i
                                        class="fas fa-pencil"></i>Edit</a>
                                <a onclick="return confirm('Anda akan menghapus subkriteria <?= $row['nama_subkriteria'] ?> pada kriteria <?= $row['nama_kriteria'] ?>?')"
                                    href="hapus.php?id=<?= $row['id_subkriteria'] ?>" class="btn btn-sm btn-danger"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                } else {
                    echo "<tr><td colspan=\"5\" align=\"center\">Data Kosong!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once '../../footer.php' ?>
