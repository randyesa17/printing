<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KeranjangModel;

class Produk extends BaseController
{
    public function index()
	{
		$model = new ProdukModel();

		$produk = $model->findAll();
		$data = [
			'produk' => $produk,
		];
		return view('user/produk/home', $data);
	}

    public function detail()
    {
		$model = new ProdukModel();
        
        $produk = $model->where('kodeproduk', $this->request->getGet('kodeproduk'))->first();
        $data = [
			'produk' => $produk,
		];
		return view('user/produk/detail', $data);
    }
    
    public function keluar()
    {
        if($this->request->getMethod() == 'post'){
            $modelKeranjang = new KeranjangModel();

			$keranjang = $modelKeranjang->where(['iduser' => session()->get('iduser'), 'kodeproduk' => $this->request->getPost('kodeproduk')])->first();
			if (empty($keranjang)) {
				$data = [
					'idkeranjang' => 'keranjang'.uniqid(),
					'iduser' => session()->get('iduser'),
					'kodeproduk' => $this->request->getPost('kodeproduk'),
					'jumlah' => $this->request->getPost('jumlah'),
				];
	
				// print_r($data);
				$modelKeranjang->insert($data);
			} else {
				$jumlah = $keranjang['jumlah'] + $this->request->getPost('jumlah');
				$data = [
					'jumlah' => $jumlah,
				];

				$modelKeranjang->update($keranjang['idkeranjang'], $data);
			}
			
			if(!$modelKeranjang->errors()){
				return redirect()->to(site_url('user/keranjang'));
			} else {
				$error = $modelKeranjang->errors();
				session()->setFlashdata('info', $error);
				return redirect()->to(site_url('user/produk/detail?kodeproduk='.$this->request->getPost('kodeproduk')));
			}
        }
    }
}