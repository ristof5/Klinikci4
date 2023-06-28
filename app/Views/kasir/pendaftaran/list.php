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
            <a href="<?= base_url('Pdf/generate/') ?>" class="btn btn btn-danger" target="_BLANK"><i class="fa fa-file-pdf-o"></i>Export PDF</a>
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
                            <th>Aksi</th>
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
                                <td>
                                    <?php echo isset($row->nama_user) ? $row->nama_user : 'N/A'; ?>
                                </td>
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
                                <td>
                                    <a href="#modalDetail<?php echo $row->id ?>" data-toggle="modal" class="btn btn-sm btn-primary">
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

<?php foreach ($data_pendaftaran as $c) : ?>
    <div class="modal fade" id="modalDetail<?php echo $c->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pendaftaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>Keluhan</th>
                            </tr>
                            <tr>
                                <td><?php echo $c->keluhan ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-undo"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php foreach ($data_pendaftaran as $q) : ?>
    <div class="modal fade" id="modalProses<?php echo $q->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proses Data Pendaftaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('pendaftaran/proses/' . $q->id) ?>" id="formProses<?php echo $q->id ?>">
                        <div class="form-group">
                            <h5>Apakah Pendaftaran Ingin diproses?</h5>
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-undo"></i> Cancel</button>
                    <button class="btn btn-success" type="submit" data-dismiss="modal" form="formProses<?php echo $q->id ?>" formaction="<?php echo base_url('pendaftaran/proses/' . $q->id) ?>"><i class="fa fa-thumbs-up"></i> Proses</button>
                </div>

                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($data_pendaftaran as $w) : ?>
    <div class="modal fade" id="modalTolak<?php echo $w->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Batalkan Data Pendaftaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Apakah Pendaftaran Ingin dibatalkan?</h5>
                    </div>
                    <form method="POST" Action="<?= base_url() ?>/pendaftaran/<?php echo $w->id ?>tolak">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-undo"></i> Cancel</button>
                    <button class="btn btn-danger" type="submit" data-dismiss="modal"><i class="fa fa-thumbs-down"></i> Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection() ?>