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
            </div>
        </div>
        <form method="POST" action="<?= base_url() ?>/pendaftaran/store" enctype="multipart/form-data">
            <div class="card-body">
                <input type="hidden" name="id_customer" value="<?= session()->get('id'); ?>">
                <input type="hidden" name="tgl_pendaftaran" value="<?= date('Y-m-d'); ?>">
                <input type="hidden" name="status_pendaftaran" value="selesai">
                <div class="form-group">
                    <label>No Pendaftaran</label>
                    <input type="text" class="form-control" value="<?php echo $no_pendaftaran;?>" readonly name="no_pendaftaran" placeholder="No Pendaftaran..." required>
                </div>
                <div class="form-group">
                    <label>Nama Customer</label>
                    <input type="text" value="<?= session()->get('nama_user'); ?>" class="form-control" readonly required>
                </div>
                <div class="form-group">
                    <label>Tanggal Pendaftaran</label>
                    <input type="text" value="<?= date('d-m-y'); ?>" class="form-control" readonly required>
                </div>
                <div class="form-group">
                    <label>Pesan Obat</label>
                    <textarea class="form-control" rows="5" name="keluhan" placeholder="Pesan Obat..." required></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save Changes</button>
                <a href="<?= base_url() ?>/pendaftaran" class="btn btn-danger"><i class="fa fa-undo"></i>Cancel</a>
            </div>
        </form>

    </div>

</div>

<?= $this->endSection() ?>