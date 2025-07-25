<?php include_once '../../header.php' ?>
<div class="col-8 m-auto p-4" style="background-color: #fff;">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4>Kriteria</h4>
        </div>
        <div>
            <a href="" class="btn btn-success">Tambah Kriteri</a>
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
                $jml = 10;
                for ($i = 1; $i < $jml; $i++) { ?>
                    <tr>
                        <td><?=$i?></td>
                        <td>kriteria1</td>
                        <td>3</td>
                        <td>cost</td>
                        <td class="d-flex" style="gap: 0.5rem !important;">
                            <a style="gap: 0.5rem !important;" href="" class="d-flex align-items-center btn btn-outline-info btn-sm"><i class="fas fa-pencil"></i>Edit</a>
                            <a onclick="return confirm('Anda akan menghapus?')" href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once '../../footer.php' ?>