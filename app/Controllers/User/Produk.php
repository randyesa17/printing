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
		$modelSatuan = new SatuanModel();

		$produk = $model->findAll();
		$satuan = $modelSatuan->findAll();
		$data = [
			'produk' => $produk,
			'satuan' => $satuan,
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
			$modelProduk = new ProdukModel();

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

				$file = $this->request->getFile('desain');
				if (!empty($file)) {
					$name = $file->getRandomName();
				} else {
					$produk = $modelProduk->find($this->request->getPost('kodeproduk'));
					if ($this->request->getPost('desain') == "desain1") {
						$name = $produk['desain1'];
					} elseif ($this->request->getPost('desain') == "desain2") {
						$name = $produk['desain2'];
					} elseif ($this->request->getPost('desain') == "desain3") {
						$name = $produk['desain3'];
					}
				}

				$namaTambahan = "";
				$tambahan = $this->request->getFile('tambahan');
				$namaTambahan = $tambahan->getName();
				if (!empty($namaTambahan)) {
					$namaTambahan = $tambahan->getRandomName();
				}

				$data = [
					'idkeranjang' => 'keranjang' . uniqid(),
					'iduser' => session()->get('iduser'),
					'kodeproduk' => $this->request->getPost('kodeproduk'),
					'p' => $p,
					'l' => $l,
					'jumlah' => $this->request->getPost('jumlah'),
					'desain' => $name,
					'keterangan' => $this->request->getPost('keterangan'),
					'tambahan' => $namaTambahan,
				];

				// print_r($data);
				if (!empty($file))
                	$file->move('./assets/images/desain/', $name);
				if (!empty($namaTambahan))
                	$tambahan->move('./assets/images/tambahan/', $namaTambahan);
				$modelKeranjang->insert($data);
			} else {
				if (!empty($this->request->getPost('p')) && !empty($this->request->getPost('l'))) {
					$p = $this->request->getPost('p');
					$l = $this->request->getPost('l');
					$jumlah = $this->request->getPost('jumlah');
					$file = $this->request->getFile('desain');
					if (!empty($file)) {
						$name = $file->getRandomName();
						$retur = 0;
					} else {
						$produk = $modelProduk->find($this->request->getPost('kodeproduk'));
						if ($this->request->getPost('desain') == "desain1") {
							$name = $produk['desain1'];
						} elseif ($this->request->getPost('desain') == "desain2") {
							$name = $produk['desain2'];
						} elseif ($this->request->getPost('desain') == "desain3") {
							$name = $produk['desain3'];
						}
					}
					$namaTambahan = "";
					$tambahan = $this->request->getFile('tambahan');
					if (!empty($tambahan)) {
						$namaTambahan = $tambahan->getRandomName();
					}
					$data = [
						'idkeranjang' => 'keranjang' . uniqid(),
						'iduser' => session()->get('iduser'),
						'kodeproduk' => $this->request->getPost('kodeproduk'),
						'p' => $p,
						'l' => $l,
						'jumlah' => $jumlah,
						'desain' => $name,
						'keterangan' => $this->request->getPost('keterangan'),
						'tambahan' => $namaTambahan,
					];
					if (!empty($file))
                		$file->move('./assets/images/desain/', $name);
					if (!empty($tambahan))
                		$tambahan->move('./assets/images/tambahan/', $namaTambahan);
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