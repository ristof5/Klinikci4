<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- bila admin yang eksekusi?? -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h5 class="m-0 font-weight-bold text-primary"><?= $title ?></h5>
                <a href="<?= base_url() ?>/customer" class="btn btn-sm btn-primary btn-round ml-auto">
                    <i class="fa fa-plus"></i>
                    Tambah Data
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>No Handphone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_user as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->nama_user ?></td>
                                <td><?= $row->username ?></td>
                                <td><?= $row->nohp ?></td>
                                <td>
                                    <a href="#modalHapus<?= $row->id ?>" data-toggle="modal" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($data_user as $c) : ?>
    <div class="modal fade" id="modalHapus<?= $c->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitle<?= $c->id ?>" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle<?= $c->id ?>">Hapus Data Customer</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url() ?>/user/<?= $c->id ?>/destroy" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <h5>Apakah Anda Ingin Menghapus Data Ini</h5>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="undo"></i> Cancel</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection() ?>
