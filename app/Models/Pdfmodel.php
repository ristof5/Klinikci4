<?php

namespace App\Models;

use CodeIgniter\Model;

class PdfModel extends Model
{
    protected $table = 'tbl_pendaftaran';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['no_pendaftaran', 'tgl_pendaftaran', 'status_pendaftaran'];

    public function getAllData()
    {
        return $this->findAll();
    }
}
