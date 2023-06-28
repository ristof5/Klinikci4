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
        <div class="card-body">
            <a href="<?= base_url('pdf/lihat') ?>" class="btn btn btn-danger" target="_BLANK"><i class="fa fa-file-pdf-o"></i>Export PDF</a>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Pendaftaran</th>
                            <th>Customer</th>
                            <th>Tgl Pendaftaran</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_pendaftaran as $row) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->no_pendaftaran ?></td>
                                <td><?php echo $row->nama_user ?></td>
                                <td><?php echo date('d/M/Y', strtotime($row->tgl_pendaftaran)) ?></td>
                                <td>
                                    <?php if ($row->status_pendaftaran == 'selesai') { ?>
                                        <div class="badge badge-sm badge-success"><?php echo $row->status_pendaftaran ?></div>
                                    <?php } else { ?>
                                        <div class="badge badge-sm badge-danger"><?php echo $row->status_pendaftaran ?></div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($row->status_pendaftaran == 'selesai') { ?>
                                        <a href="#modalTolak<?php echo $row->id ?>" data-toggle="modal" class="btn btn-sm btn-danger">
                                            <i class="fa fa-thumbs-down"></i> Batal
                                        </a>
                                    <?php } else { ?>
                                        <a href="#modalDetail<?php echo $row->id ?>" data-toggle="modal" class="btn btn-sm btn-primary">
                                            <i class="fa fa-list"></i> Detail
                                        </a>
                                    <?php } ?>
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