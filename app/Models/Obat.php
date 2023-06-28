<?php

namespace App\Models;

use CodeIgniter\Model;

class Obat extends Model
{
    protected $table = "tbl_obat";
    protected $primaryKey = "id";

    protected $returnType = "object";
    protected $useTimeStamps = "false";
    protected $allowedFields = ['nama_obat', 'harga', 'stok', 'deskripsi'];
}
