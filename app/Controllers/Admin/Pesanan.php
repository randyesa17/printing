<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\DaerahModel;

class Pesanan extends BaseController
{
    public function index()
	{
		$model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();

		$pesanan = $model->orderBy('tgl', 'desc')->findAll();
		$user = $modelUser->findAll();
		$produk = $modelProduk->findAll();
		$data = [
			'judul' => 'Data Transaksi Pesanan',
			'pesanan' => $pesanan,
			'user' => $user,
			'produk' => $produk,
            'no' => 1,
		];

		return view('admin/pesanan/home', $data);
	}

    public function verifikasi()
    {
		$model = new TransaksiModel();

        $data = [
            'status' => 'Diproses',
        ];

        $transaksi = $model->where('idtransaksi', $this->request->getGet('idtransaksi'))->first();
        
        $model->update($this->request->getGet('idtransaksi'), $data);
        return redirect()->to(site_url('admin/transaksi'));
    }

    public function kirim()
    {
		$model = new TransaksiModel();

        $data = [
            'status' => 'Dikirim',
        ];

        $model->update($this->request->getGet('idtransaksi'), $data);
        return redirect()->to(site_url('admin/transaksi'));
    }
}