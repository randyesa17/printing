<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		return view('user/home');
	}

	public function check()
	{
		$model = new UserModel;

		$user = $model->where('iduser', session()->get('iduser'))->first();
		if(empty($user['alamat'])){
			session()->setFlashdata('info', 'Silahkan Lengkapi Profil');
            return redirect()->to(site_url('user/profil'));
		} else {
            return redirect()->to(site_url('user/produk/detail?kodeproduk='.$this->request->getGet('kodeproduk')));
		}
	}
}