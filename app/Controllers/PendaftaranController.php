<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pendaftaran;
use Dompdf\Dompdf;

class PendaftaranController extends BaseController
{

    public function index()
    {
        $pendaftaran = new Pendaftaran();

        $data = array(
            'title'            => 'Data Pendaftaran',
            'data_pendaftaran' => $pendaftaran->getAllData(),
        );
        return view('customer/pendaftaran/list', $data);
    }
    public function kasir()
    {
        $pendaftaran = new Pendaftaran();

        $data = array(
            'title'            => 'Data Pendaftaran',
            'data_pendaftaran' => $pendaftaran->getAllData(),
        );
        return view('kasir/pendaftaran/list', $data);
    }

    public function add()
    {
        $pendaftaran = new pendaftaran();
        $data = array(
            'title'            => 'Create Data Pendaftaran',
            'no_pendaftaran'   => $pendaftaran->getNoPendaftaran(),
        );
        return view('/customer/pendaftaran/add', $data);
    }

    //=====================================insert data ==========================================

    public function store()
    {
        $pendaftaran = new Pendaftaran();
        $pendaftaran->insert([
            'no_pendaftaran'     => $this->request->getVar('no_pendaftaran'),
            'id_customer'        => $this->request->getVar('id_customer'),
            'tgl_pendaftaran'    => $this->request->getVar('tgl_pendaftaran'),
            'keluhan'            => $this->request->getVar('keluhan'),
            'status_pendaftaran' => $this->request->getVar('status_pendaftaran'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil Disimpan');
        return redirect()->to('/pendaftaran');
    }
    //=====================================Update data ==========================================

    public function proses($id)
    {
        $pendaftarans = new Pendaftaran();
        $data['pendaftaran'] = $pendaftarans->where('id', $id)->first();

        $pendaftarans->update($id, [
            'status_pendaftaran' => 'proses',
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diproses');
        return redirect()->to('/pendaftaran/kasir/');
    }
    public function tolak($id)
    {
        $pendaftarans = new Pendaftaran();
        $data['pendaftaran'] = $pendaftarans->where('id', $id)->first();

        $pendaftarans->update($id, [
            'status_pendaftaran' => 'dibatalkan',
        ]);

        session()->setFlashdata('success', 'Data Berhasil Dibatalkan');
        return redirect()->to('/pendaftaran/kasir/');
    }
    public function generate()
    {
        $pendaftaran = new Pendaftaran();

        // Mendapatkan parameter untuk menentukan tampilan yang ingin di-generate ke PDF
        $viewName = 'kasir/pendaftaran/list'; // Nama view yang ingin di-generate ke PDF
        $paperSize = 'A4'; // Ukuran kertas
        $orientation = 'landscape'; // Orientasi kertas
        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report'; // Nama file PDF
    
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
    
        // Load HTML content from the specified view
        $html = view($viewName, ['data_pendaftaran' => $pendaftaran->getAllData()]);
    
        // Load HTML content into dompdf
        $dompdf->loadHtml($html);
    
        // (optional) setup the paper size and orientation
        $dompdf->setPaper($paperSize, $orientation);
    
        // Render HTML as PDF
        $dompdf->render();
    
        // Output the generated PDF to the browser
        $dompdf->stream($filename);
    }
    
   
     

}
