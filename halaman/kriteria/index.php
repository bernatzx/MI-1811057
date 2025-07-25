<?php include_once '../../header.php' ?>
<div class="col-8 m-auto p-4" style="background-color: #fff;">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4>Kriteria</h4>
        </div>
        <div class="d-flex align-items-center gap">
            <div>
                <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-refresh"></i></a>
            </div>
            <div>
                <a href="tambah.php" class="d-flex align-items-center gap btn btn-sm btn-success"><i
                        class="fas fa-plus"></i>Tambah Kriteria</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Bobot</th>
                    <th>Sifat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $sql = mysqli_query($hub, 'SELECT * FROM tb_kriteria') or die(mysqli_error($hub));
                if (mysqli_num_rows($sql) > 0) {
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $i++; ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['nama_kriteria'] ?></td>
                            <td><?= $row['bobot_kriteria'] ?></td>
                            <td><?= ucfirst($row['sifat_kriteria']) ?></td>
                            <td class="d-flex gap">
                                <a href="ubah.php?id=<?= $row['id_kriteria'] ?>"
                                    class="gap d-flex align-items-center btn btn-outline-info btn-sm"><i
                                        class="fas fa-pencil"></i>Edit</a>
                                <a onclick="return confirm('Anda akan menghapus?')" href="" class="btn btn-sm btn-danger"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once '../../footer.php' ?>