<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran extends Model
{
    protected $table = "tbl_pendaftaran";
    protected $primaryKey = "id";

    protected $returnType = "object";
    protected $useTimeStamps = "false";
    protected $allowedFields = ['no_pendaftaran', 'id_customer', 'tgl_pendaftaran', 'keluhan', 'status_pendaftaran'];

    public function getAllData()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('tbl_pendaftaran');
        $builder->select('tbl_pendaftaran.*, user.nama_user');
        $builder->join('user', 'user.id = tbl_pendaftaran.id_customer');
        $builder->orderBy('tbl_pendaftaran.id','DESC');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getNoPendaftaran()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('tbl_pendaftaran ');
        $builder->select('RIGHT(tbl_pendaftaran.no_pendaftaran,2) as no_pendaftaran',FALSE);
        $builder->orderBy('no_pendaftaran','DESC');
        $builder->limit(1);
        $query = $builder->get();
        
        if($query->getFieldCount() <> 0){
            $data = $query->getRow();
            $kode = intval($data->no_pendaftaran) + 1;
        }else{
            $kode = 1;
        }
            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = "NP-".$batas;
            return $kodetampil; 
        

    }
}