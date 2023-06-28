<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_user'    => 'admin',
            'username'     => 'admin',
            'password'     =>  password_hash('admin',PASSWORD_BCRYPT),
            'email'        => 'admin@gmail.com',
            'nohp'         => '0812345678',
            'tgl_lahir'    => '1997-01-02',
            'role'         => 'admin',
        ];


        // Using Query Builder
        $this->db->table('user')->insert($data);
    }
}
