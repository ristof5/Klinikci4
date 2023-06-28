<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Obat;

class ObatController extends BaseController
{
    public function index()
    {
        $obat = new obat();
        $data = array(
            'title' => 'Data Obat',
            'data_obat' => $obat->findAll(),

        );

        return view('/admin/obat/list', $data);
    }

    //=====================================insert data ==========================================

    public function store()
    {
        $obat = new Obat();
        $obat->insert([
            'nama_obat' => $this->request->getVar('nama_obat'),
            'harga'     => $this->request->getVar('harga'),
            'stok'      => $this->request->getVar('stok'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil Disimpan');
        return redirect()->to('/obat');
    }

    //=====================================edit data ==========================================

    public function edit($id)
    {
        $obats = new Obat();
        $data['obat'] = $obats->where('id', $id)->first();

        $obats->update($id, [
            'nama_obat' => $this->request->getVar('nama_obat'),
            'harga'     => $this->request->getVar('harga'),
            'stok'      => $this->request->getVar('stok'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to('/obat');
    }

    //=====================================Hapus data ==========================================
    public function destroy($id)
    {
        $obat = new Obat();
        $obat->delete($id);

        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/obat');
    }
}
