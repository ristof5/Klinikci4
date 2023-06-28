<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PdfModel;
use Dompdf\Dompdf;

class PdfController extends BaseController
{
    public function generate()
    {
        $pdfModel = new PdfModel();
        $data = $pdfModel->getAllData();

        $html = $this->generateHtml($data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('data.pdf', ['Attachment' => false]);
    }

    private function generateHtml($data)
    {
        $html = '<table>';
        $html .= '<thead><tr><th>No</th><th>No Pendaftaran</th><th>Tgl Pendaftaran</th><th>Status</th></tr></thead>';
        $html .= '<tbody>';

        $no = 1;
        foreach ($data as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $no++ . '</td>';
            $html .= '<td>' . $row['no_pendaftaran'] . '</td>';
            $html .= '<td>' . date('d/M/Y', strtotime($row['tgl_pendaftaran'])) . '</td>';
            $html .= '<td>' . $row['status_pendaftaran'] . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';

        return $html;
    }
}
