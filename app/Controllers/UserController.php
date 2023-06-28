<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $user = new User();
        $data = array(
            'title' => 'Data User',
            'data_user' => $user->whereIn('role', ['admin','kasir','dokter'])->findAll(),

        );

        return view('/admin/user/list', $data);
    }
    public function customer()
    {
        $user = new User();
        $data = array(
            'title' => 'Data Customer',
            'data_user' => $user->where('role','customer')->findAll(),

        );

        return view('/admin/customer/list', $data);
    }

    //=====================================insert data ==========================================

    public function store()
    {
        $user = new user();
        $user->insert([
            'nama_user' => $this->request->getVar('nama_user'),
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'email'     => $this->request->getVar('email'),
            'nohp'      => $this->request->getVar('nohp'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'role'      => $this->request->getVar('role')
        ]);
        session()->setFlashdata('success', 'Data Berhasil Disimpan');
        return redirect()->to('/user');
    }

    //=====================================edit data ==========================================

    public function edit($id)
    {
        $users = new User();
        $data['user'] = $users->where('id', $id)->first();

        $users->update($id, [
            'nama_user' => $this->request->getVar('nama_user'),
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'email'     => $this->request->getVar('email'),
            'nohp'      => $this->request->getVar('nohp'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'role'      => $this->request->getVar('role')
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to('/user');
    }

    //=====================================Hapus data ==========================================
    public function destroy($id)
    {
        $user = new User();
        $user->delete($id);

        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/user');
    }
}
