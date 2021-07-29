<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\DaerahModel;

class Keranjang extends BaseController
{
    public function index()
	{
		$model = new KeranjangModel();
		$modelProduk = new ProdukModel();

		$keranjang = $model->where('iduser', session()->get('iduser'))->findAll();
        $produk = $modelProduk->findAll();
		$data = [
			'keranjang' => $keranjang,
			'produk' => $produk,
		];
		return view('user/keranjang/home', $data);
	}

    public function update()
    {
		$model = new KeranjangModel();
        
        $data = [
            'jumlah' => $this->request->getGet('jumlah'),
        ];
        
        $model->update($this->request->getGet('idkeranjang'), $data);
        if(!$model->errors()){
            return redirect()->to(site_url('user/keranjang/checkout?idkeranjang='.$this->request->getGet('idkeranjang')));
        } else {
            $error = $mode->errors();
            session()->setFlashdata('info', $error);
            return redirect()->to(site_url('user/keranjang'));
        }
    }

    public function checkout()
    {
		$model = new KeranjangModel();
		$modelProduk = new ProdukModel();
		$modelUser = new UserModel();
		$modelDaerah = new DaerahModel();

        $keranjang = $model->where('idkeranjang', $this->request->getGet('idkeranjang'))->first();
        $produk = $modelProduk->where('kodeproduk', $keranjang['kodeproduk'])->first();
        $user = $modelUser->where('iduser', $keranjang['iduser'])->first();
        $daerah = $modelDaerah->findAll();

        $data = [
            'keranjang' => $keranjang,
            'produk' => $produk,
            'user' => $user,
            'daerah' => $daerah,
            'total' => $keranjang['jumlah'] * $produk['harga'],
            'kode' => 'transaksi'.date('Ymdhis')
        ];
		return view('user/keranjang/checkout', $data);
    }
}