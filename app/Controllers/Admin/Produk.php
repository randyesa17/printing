<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    public function index()
	{
		$model = new ProdukModel();

		$produk = $model->findAll();
		$data = [
			'judul' => 'Data Produk',
			'produk' => $produk,
            'no' => 1,
		];

		return view('admin/produk/home', $data);
	}

    public function desain()
    {
        $model = new ProdukModel();

		$produk = $model->find($this->request->getGet('kodeproduk'));
		$data = [
			'judul' => 'Desain '.$produk['namaproduk']." ".$produk['kodeproduk'],
			'produk' => $produk,
            'no' => 1,
		];

		return view('admin/produk/desain', $data);
    }

    public function tambahdesain()
    {
        if($this->request->getMethod() == 'post'){
            $model = new ProdukModel();

		    $produk = $model->find($this->request->getPost('kodeproduk'));
            $file = $this->request->getFile('desain');
            $desain = $file->getRandomName();

            if (empty($produk['desain2'])) {
                $data = [
                    'desain2' => $desain,
                ];                
            } elseif (empty($produk['desain3'])) {
                $data = [
                    'desain3' => $desain,
                ];
            }
            $model->update($this->request->getPost('kodeproduk'), $data);
            $file->move('./assets/images/desain', $desain);
            return redirect()->to(site_url('admin/produk/desain?kodeproduk='.$this->request->getPost('kodeproduk')));
        }
    }

    public function ubahdesain()
    {
        if($this->request->getMethod() == 'post'){
            $model = new ProdukModel();

            if (!empty($this->request->getFile('desain1'))) {
                $file = $this->request->getFile('desain1');
                $desain = $file->getRandomName();

                $data = [
                    'desain1' => $desain,
                ];                
            } elseif (!empty($this->request->getFile('desain2'))) {
                $file = $this->request->getFile('desain2');
                $desain = $file->getRandomName();

                $data = [
                    'desain2' => $desain,
                ];                
            } elseif (!empty($this->request->getFile('desain3'))) {
                $file = $this->request->getFile('desain3');
                $desain = $file->getRandomName();

                $data = [
                    'desain3' => $desain,
                ];
            }
            $model->update($this->request->getPost('kodeproduk'), $data);
            $file->move('./assets/images/desain', $desain);
            return redirect()->to(site_url('admin/produk/desain?kodeproduk='.$this->request->getPost('kodeproduk')));
        }
    }

    public function tambah()
	{
		if($this->request->getMethod() == 'post'){
            $model = new ProdukModel();

            $filegambar = $this->request->getFile('gambar');
            $gambar = $filegambar->getRandomName();
            $filedesain1 = $this->request->getFile('desain1');
            $desain1 = $filedesain1->getRandomName();

            $data = [
                'namaproduk' => $this->request->getPost('namaproduk'),
                'kodeproduk' => $this->request->getPost('kodeproduk'),
                'gambar' => $gambar,
                'harga' => $this->request->getPost('harga'),
                'berat' => $this->request->getPost('berat'),
                'keterangan' => $this->request->getPost('keterangan'),
                'minimal' => $this->request->getPost('minimal'),
                'desain1' => $desain1,
            ];

            $model->insert($data);
            if(!$model->errors()){
                $filegambar->move('./assets/images/produk', $gambar);
                $filedesain1->move('./assets/images/desain', $desain1);
                return redirect()->to(site_url('admin/produk'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/produk/tambah'));
            }
		} else {
			$db = \Config\Database::connect();

			$sql = "SELECT max(kodeproduk) as kodeTerbesar FROM produk";
			$result = $db->query($sql);
			$row = $result->getResult('array');
			$kodeBarang = $row[0]['kodeTerbesar'];
			$urutan = (int) substr($kodeBarang, 2, 3);
			$urutan++;

			$huruf = "P";
			$kodeBarang = $huruf . sprintf("%03s", $urutan);
			$data = [
				'judul' => 'Tambah Data Produk',
				'kode' => $kodeBarang,
			];
			return view('admin/produk/tambah', $data);
		}
	}

    public function ubah()
    {
        if($this->request->getMethod() == 'post'){
            $model = new ProdukModel();

            $filegambar = $this->request->getFile('gambar');
            $gambar = $filegambar->getName();

            if(empty($gambar)){
                $gambar = $this->request->getPost('gambar');
            } else {
                $gambar = $filegambar->getRandomName();
                $filegambar->move('./assets/images/produk', $gambar);
            }

            $data = [
                'namaproduk' => $this->request->getPost('namaproduk'),
                'gambar' => $gambar,
                'harga' => $this->request->getPost('harga'),
                'berat' => $this->request->getPost('berat'),
                'keterangan' => $this->request->getPost('keterangan'),
                'minimal' => $this->request->getPost('minimal'),
            ];

            $model->update($this->request->getPost('kodeproduk'), $data);
            if(!$model->errors()){
                return redirect()->to(site_url('admin/produk'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/produk/ubah/'.$this->request->getPost('kodeproduk')));
            }
            // print_r($data);
        } else {
            $model = new ProdukModel();

			$produk = $model->where('kodeproduk', $this->request->getGet('kodeproduk'))->first();
			$data = [
				'judul' => 'Ubah Data Produk',
				'produk' => $produk,
			];
			return view('admin/produk/ubah', $data);
        }
    }
    
    public function hapus()
    {
        $model = new ProdukModel();

        $model->delete($this->request->getGet('kodeproduk'));
        return redirect()->to(site_url('admin/produk'));
    }
}