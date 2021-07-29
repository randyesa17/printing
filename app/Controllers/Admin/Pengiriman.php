<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\DaerahModel;

class Pengiriman extends BaseController
{
    public function index()
	{
		$model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();

		$pesanan = $model->where('status', 'Dikirim')->findAll();
		$user = $modelUser->findAll();
		$produk = $modelProduk->findAll();
		$data = [
			'judul' => 'Data Pengiriman',
			'pesanan' => $pesanan,
			'user' => $user,
			'produk' => $produk,
            'no' => 1,
		];

		return view('admin/pengiriman/home', $data);
	}
}