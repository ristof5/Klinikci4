<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
   protected $table = "user";
   protected $primaryKey = "id";
   
   protected $returnType = "object";
   protected $useTimeStamps = "false";
   protected $allowedFields = ['nama_user', 'username', 'password', 'email', 'nohp', 'tgl_lahir','role']; 
}
