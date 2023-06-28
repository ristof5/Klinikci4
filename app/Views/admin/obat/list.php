<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Obat</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h5 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h5>
                <button class="btn btn-sm btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                    <i class="fa fa-plus"></i>
                    Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Obat</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_obat as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->nama_obat ?></td>
                                <td>Rp.<?php echo number_format($row->harga) ?></td>
                                <td><?php echo $row->stok ?></td>
                                <td><?php echo $row->deskripsi ?></td>
                                <td>
                                    <a href="#modalEdit<?php echo $row->id ?>" data-toggle="modal" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>Edit </a>
                                    <a href="#modalHapus<?php echo $row->id ?>" data-toggle="modal" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>Hapus </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <!-- Tambahkan data lainnya sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Data Obat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?= base_url() ?>/ObatController/store" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat ..." required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                            </div>
                            <input type="number" name="harga" class="form-control" placeholder="Harga..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <input type="number" name="stok" class="form-control" placeholder="Stok..." required>
                                <span class="input-group-text" id="basic-addon2">PCS</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="5" required></textarea>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="undo"></i>Cancel</button>
            <!--alur logout-->
            <a class="btn btn-primary"><i class="fa fa-save"></i>Simpan Perubahan</a>
        </div>
        </form>
    </div>
</div>
</div>
<!-- form edit -->
<?php foreach ($data_obat as $d) : ?>
    <div class="modal fade" id="modalEdit <?php echo $d->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Edit Obat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url() ?>/ObatController/edit<?php echo $d->id ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Obat</label>
                            <input type="text" class="form-control" name="nama_obat" value="<?php echo $d->nama_obat ?>" placeholder="Nama Obat ..." required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input type="number" name="harga" value="<?php echo $d->harga ?>" class="form-control" placeholder="Harga..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <input type="number" name="stok" value="<?php echo $d->stok ?>" class="form-control" placeholder="Stok..." required>
                                    <span class="input-group-text" id="basic-addon2">PCS</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi..." rows="5" required><?php echo $d->deskripsi ?>"</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class=" fa fa-undo"></i>Cancel</button>
                        <!--alur ubah-->
                        <button type="submit" class="btn btn-primary"><i class="fa fa-safe"></i>Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php foreach ($data_obat as $c) : ?>
    <div class="modal fade" id="modalHapus <?php echo $d->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Obat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <form method="SET" action="<?= base_url() ?>/obat<?php echo $c->id ?>/destroy" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <h5>Apakah Anda Ingin Menghapus Data Ini</h5>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="undo"></i>Cancel</button>
                <!--alur logout-->
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</button>
            </div>
            </form>
        </div>
    </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection() ?>