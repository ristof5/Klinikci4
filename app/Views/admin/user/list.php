<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>

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
                            <th>Nama</th>
                            <th>Username</th>
                            <th>No Handphone</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_user as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->nama_user ?></td>
                                <td><?php echo $row->username ?></td>
                                <td><?php echo $row->nohp ?></td>
                                <td><?php echo $row->role ?></td>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Data User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?= site_url('user/store') ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_user" placeholder="Nama Lengkap ..." required>
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username ..." required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password ..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email ..." required>
                                </div>

                                <div class="form-group">
                                    <label>No Handphone</label>
                                    <input type="number" class="form-control" name="nohp" placeholder="No Handphone ..." required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" required>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role" required>
                                        <option value="" hidden>-- Pilih Role --</option>
                                        <option value="admin">Admin</option>
                                        <option value="dokter">Dokter</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="undo"></i>Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- form edit -->
<?php foreach ($data_user as $d) : ?>
    <div class="modal fade" id="modalEdit <?php echo $d->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Edit User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url() ?>/user<?php echo $d->id ?>/edit" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?php echo $d->nama_user ?> " name="nama_user" placeholder="Nama Lengkap ..." required>
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="<?php echo $d->username ?>" name="username" placeholder="Username ..." required>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" value="<?php echo $d->password ?>" name="password" placeholder="Password ..." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="<?php echo $d->email ?>" name="email" placeholder="Email ..." required>
                                    </div>

                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input type="number" class="form-control" value="<?php echo $d->nohp ?>" name="nohp" placeholder="No Handphone ..." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" value="<?php echo $d->tgl_lahir ?>" name="tgl_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role" required>
                                            <option value="" hidden>-- Pilih Mode --</option>
                                            <option <?php if ($d->role == "admin") echo "selected" ?>value="admin">Admin</option>
                                            <option <?php if ($d->role == "dokter") echo "selected" ?>value="dokter">Dokter</option>
                                            <option <?php if ($d->role == "kasir") echo "selected" ?>value="kasir">Kasir</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class=" fa fa-undo"></i>Cancel</button>
                                <!--alur logout-->
                                <button type="submit" class="btn btn-primary"><i class="fa fa-safe"></i>Simpan Perubahan</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php foreach ($data_user as $c) : ?>
    <div class="modal fade" id="modalHapus <?php echo $c->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <form method="SET" action="<?= base_url() ?>/user<?php echo $c->id ?>/destroy" enctype="multipart/form-data">
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