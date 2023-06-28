<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h5 class="m-0 font-weight-bold text-primary"><?= $title ?></h5>
                <a href="<?= base_url() ?>/transaksi/add" class="btn btn-sm btn-primary btn-round ml-auto">
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
                            <th>No Transaksi</th>
                            <th>Customer</th>
                            <th>Tgl Transaksi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_transaksi as $row) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->no_transaksi ?></td>
                                <td><?php echo $row->nama_user ?></td>
                                <td><?php echo date('d/M/Y', strtotime($row->tgl_transaksi)) ?></td>
                                <td>
                                    <?php if ($row->status_transaksi == 'belum bayar') { ?>
                                        <div class="badge badge-sm badge-warning"><?php echo $row->status_transaksi ?></div>
                                    <?php } else { ?>
                                        <div class="badge badge-sm badge-success"><?php echo $row->status_transaksi ?></div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>/transaksi/detail<?php ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-list"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>


                </table>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>