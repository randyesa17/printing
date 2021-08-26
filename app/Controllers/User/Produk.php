<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KeranjangModel;
use App\Models\SatuanModel;

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
		$modelSatuan = new SatuanModel();

		$produk = $model->where('kodeproduk', $this->request->getGet('kodeproduk'))->first();
		$satuan = $modelSatuan->findAll();
		$data = [
			'produk' => $produk,
			'satuan' => $satuan,
		];
		return view('user/produk/detail', $data);
	}

	public function keluar()
	{
		if ($this->request->getMethod() == 'post') {
			$modelKeranjang = new KeranjangModel();

			$keranjang = $modelKeranjang->where(['iduser' => session()->get('iduser'), 'kodeproduk' => $this->request->getPost('kodeproduk')])->first();
			if (empty($keranjang)) {
				$p = '';
				$l = '';
				if (!empty($this->request->getPost('p'))) {
					$p = $this->request->getPost('p');
				}
				if (!empty($this->request->getPost('l'))) {
					$l = $this->request->getPost('l');
				}
				$data = [
					'idkeranjang' => 'keranjang' . uniqid(),
					'iduser' => session()->get('iduser'),
					'kodeproduk' => $this->request->getPost('kodeproduk'),
					'p' => $p,
					'l' => $l,
					'jumlah' => $this->request->getPost('jumlah'),
				];

				// print_r($data);
				$modelKeranjang->insert($data);
			} else {
				if (!empty($this->request->getPost('p')) && !empty($this->request->getPost('l'))) {
					$p = $this->request->getPost('p');
					$l = $this->request->getPost('l');
					$jumlah = $this->request->getPost('jumlah');
					$data = [
						'idkeranjang' => 'keranjang' . uniqid(),
						'iduser' => session()->get('iduser'),
						'kodeproduk' => $this->request->getPost('kodeproduk'),
						'p' => $p,
						'l' => $l,
						'jumlah' => $jumlah,
					];
					$modelKeranjang->insert($data);
				} else {
					$jumlah = $keranjang['jumlah'] + $this->request->getPost('jumlah');
					$data = [
						'jumlah' => $jumlah,
					];
					$modelKeranjang->update($keranjang['idkeranjang'], $data);
				}
			}

			if (!$modelKeranjang->errors()) {
				return redirect()->to(site_url('user/keranjang'));
			} else {
				$error = $modelKeranjang->errors();
				session()->setFlashdata('info', $error);
				return redirect()->to(site_url('user/produk/detail?kodeproduk=' . $this->request->getPost('kodeproduk')));
			}
		}
	}
}