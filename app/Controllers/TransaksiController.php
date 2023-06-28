<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaksi;

class TransaksiController extends BaseController
{
    public function index()
    {
        $transaksi = new Transaksi();

        $data = array(
            'title'            => 'Data Transaksi',
            'data_transaksi' => $transaksi->getAllData(),
        );
        return view('dokter/transaksi/list', $data);
    }
    public function add()
    {
        $transaksi = new Transaksi();

        $data = array(
            'title'            => 'Create Data Transaksi',
            'no_transaksi' => $transaksi->getNoTransaksi(),
        );
        return view('dokter/transaksi/add', $data);
    }
    public function store()
    {
        $transaksi = new Transaksi();
        $transaksi->insert([
            'no_pendafratan'   => $this->request->getVar('no_pendaftaran'),
            'no_transaksi'     => $this->request->getVar('no_transaksi'),
            'nama_customer'    => $this->request->getVar('nama_customer'),
            'tgl_transaksi'    => $this->request->getVar('tgl_transaksi'),
            'keluhan'          => $this->request->getVar('keluhan'),
            'biaya_pengobatan' => $this->request->getVar('biaya_pengobatan'),
            'total_biaya'      => $this->request->getVar('total_biaya'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil Disimpan');
        return redirect()->to('/transaksi');
    }
}
