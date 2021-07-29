<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Admin extends BaseController
{
	public function index()
	{
		$model = new AdminModel();

		$admin = $model->findAll();

		$data = [
			'judul' => 'Data Admin',
			'no' => 1,
			'admin' => $admin,
		];
		return view('admin/atur', $data);
	}

	public function login()
    {
        if($this->request->getMethod() == 'post'){
            $model = new AdminModel();

            $email = $this->request->getPost('email');
            $password = sha1($this->request->getPost('password'));

            $admin = $model->where(['email' => $email, 'password' => $password])->first();

            if(empty($admin)){
                session()->setFlashdata('info', 'Email atau Password Salah!');
                return redirect()->to(site_url('admin/login'));
            } else {
                $this->setSession($admin);
                return redirect()->to(site_url('admin'));
            }
        } else {
            $data = [
                'judul' => 'Login Admin',
                'action' => 'admin/login'
            ];
            return view('templates/login', $data);
        }
    }

    public function setSession($admin)
    {
        $data = [
            'kodeadmin' => $admin['kodeadmin'],
            'nama' => $admin['nama'],
            'email' => $admin['email'],
            'password' => $admin['password'],
            'loggedIn' => true
        ];

        session()->set($data);
    }

	public function tambah()
	{
		if($this->request->getMethod() == 'post'){
			$model = new AdminModel();

			$password = sha1($this->request->getPost('password'));
			$data = [
				'kodeadmin' => $this->request->getPost('kodeadmin'),
				'email' => $this->request->getPost('email'),
				'password' => $password,
				'nama' => $this->request->getPost('nama'),
			];

			// print_r($data);
			$model->insert($data);
			if(!$model->errors()){
				return redirect()->to(site_url('admin/atur'));
			} else {
				$error = $model->errors();
				session()->setFlashdata('info', $error);
				return redirect()->to(site_url('admin/tambah'));
			}
		} else {
			$db = \Config\Database::connect();

			$sql = "SELECT max(kodeadmin) as kodeTerbesar FROM admin";
			$result = $db->query($sql);
			$row = $result->getResult('array');
			$kodeAdmin = $row[0]['kodeTerbesar'];
			$urutan = (int) substr($kodeAdmin, 3, 3);
			$urutan++;

			$huruf = "ADM";
			$kodeAdmin = $huruf . sprintf("%03s", $urutan);
			$data = [
				'judul' => 'Input Data Admin',
				'kode' => $kodeAdmin,
			];
			
			return view('admin/tambah', $data);
		}
	}

	public function hapus()
    {
        $model = new AdminModel();

        $model->delete($this->request->getGet('kodeadmin'));
        return redirect()->to(site_url('admin/atur'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('admin/login'));
    }
}