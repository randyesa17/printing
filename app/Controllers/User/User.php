<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function daftar()
    {
        if($this->request->getMethod() == 'post'){
            $model = new UserModel();

			$password = sha1($this->request->getPost('password'));
			$data = [
				'iduser' => $this->request->getPost('iduser'),
				'email' => $this->request->getPost('email'),
				'password' => $password,
				'namauser' => $this->request->getPost('namauser'),
			];

			// print_r($data);
			$model->insert($data);
			if(!$model->errors()){
				return redirect()->to(site_url('user/login'));
			} else {
				$error = $model->errors();
				session()->setFlashdata('info', $error);
				return redirect()->to(site_url('user/daftar'));
			}
        } else {
			$kodeUser = "user".uniqid();
			$data = [
				'judul' => 'Daftar',
				'kode' => $kodeUser,
			];
			
			return view('templates/daftar', $data);
		}
    }

    public function login()
    {
        if($this->request->getMethod() == 'post'){
            $model = new UserModel();

            $email = $this->request->getPost('email');
            $password = sha1($this->request->getPost('password'));

            $user = $model->where(['email' => $email, 'password' => $password])->first();

            if(empty($user)){
                session()->setFlashdata('info', 'Email atau Password Salah!');
                return redirect()->to(site_url('user/login'));
            } else {
                $this->setSession($user);
                return redirect()->to(site_url('user'));
            }
        } else {
            $data = [
                'judul' => 'Login',
                'action' => 'user/login'
            ];
            return view('templates/login', $data);
        }
    }

    public function setSession($user)
    {
        $data = [
            'iduser' => $user['iduser'],
            'namauser' => $user['namauser'],
            'email' => $user['email'],
            'password' => $user['password'],
            'loggedIn' => true
        ];

        session()->set($data);
    }

    public function profil()
	{
		$model = new UserModel();
		
		$user = $model->where('iduser', session()->get('iduser'))->first();
		$data = [
			'judul' => 'PROFIL '.$user['namauser'],
			'user' => $user,
		];
		return view('user/profil', $data);
	}

    public function ubah()
	{
		$model = new UserModel();

		$data = [
			'email' => $this->request->getPost('email'),
			'nama' => $this->request->getPost('nama'),
			'telp' => $this->request->getPost('telp'),
			'alamat' => $this->request->getPost('alamat'),
		];

		$model->update(session()->get('kodeuser'), $data);
		if(!$model->errors()){
			return redirect()->to(site_url('user/profil'));
		} else {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(site_url('user/profil'));
		}
	}

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url());
    }
}