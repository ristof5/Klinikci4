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
        <form method="POST" action="<?= base_url() ?>/transaksi/store" enctype="multipart/form-data">
            <div class="card-body">
                <input type="hidden" name="tgl_transaksi" value="<?= date('Y-m-d'); ?>">
                <input type="hidden" name="status_transaksi" value="belum bayar">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="modalAdd"><i>Tambah Obat</i></button>
                <hr />
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>No </th>
                            <th>Obat</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No Pendaftaran </label>
                            <select class="form-control" name="id_pendaftaran">
                                <option value="" hidden>-- Pilih No Pendaftaran </option>
                                <option>sukka</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Customer</label>
                            <input type="text" class="form-control" placeholder="Nama Customer..." readonly>
                        </div>
                        <div class="form-group">
                            <label>Keluhan </label>
                            <textarea class="form-control" rows="5" placeholder="Keluhan..." readonly></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No Transaksi</label>
                            <input type="text" class="form-control" readonly name="no_transaksi" required>
                        </div>
                        <div class="form-group">
                            <label>Tgl Transaksi</label>
                            <input type="text" value="<?= date('d-m-y'); ?>" class="form-control" readonly required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Biaya Pengobatan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input type="number" name="biaya_pengobatan" class="form-control" placeholder="Biaya Pengobatan..." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total Biaya</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input type="text" name="total_biaya" class="form-control" placeholder="Total Biaya..." readonly required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save Changes</button>
                <a href="<?= base_url() ?>/transaksi" class="btn btn-danger"><i class="fa fa-undo"></i>Cancel</a>
            </div>
        </form>
    </div>

</div>
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Obat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?= base_url() ?>/transaksi/keranjang" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Obat</label>
                    <select class="form-control" name="id_obat">
                        <option value="" hidden>-- Pilih Obat </option>
                        <option>sukka</option>
                    </select>
                    </div>
                </div>
                <div id="tampil_obat"></div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="undo"></i>Cancel</button>
            <!--alur logout-->
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</button>
        </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>