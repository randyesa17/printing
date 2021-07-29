<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\DaerahModel;

class Pesanan extends BaseController
{
    public function masuk()
    {
        if($this->request->getMethod() == 'post'){
            $model = new TransaksiModel();
            $modelKeranjang = new KeranjangModel();
            $modelProduk = new ProdukModel();
            $modelUser = new UserModel();
            $modelDaerah = new DaerahModel();

            if ($this->request->getPost('telp') != '' && $this->request->getPost('alamat') != '') {
                $dataUser = [
                    'alamat' => $this->request->getPost('alamat'),
                    'telp' => $this->request->getPost('telp'),
                ];

            $modelUser->update($this->request->getPost('iduser'), $dataUser);
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
            
            $data = [
                'idtransaksi' => $this->request->getPost('idtransaksi'),
                'iduser' => $this->request->getPost('iduser'),
                'kodeproduk' => $this->request->getPost('kodeproduk'),
                'jumlah' => $this->request->getPost('jumlah'),
                'totalharga' => $this->request->getPost('totalharga'),
                'desain' => $name,
                'kodepos' => $this->request->getPost('kodepos'),
                'ongkir' => $this->request->getPost('ongkir'),
                'totalbiaya' => $this->request->getPost('total'),
                'status' => 'Belum Bayar',
            ];

            $model->insert($data);
            if (!empty($file))
            $file->move('./assets/images/desain', $name);
            $modelKeranjang->delete($this->request->getPost('idkeranjang'));
			return redirect()->to(site_url('user/pesanan/bayar?idtransaksi='.$this->request->getPost('idtransaksi')));
            // print_r($data);
        }
    }

    public function index()
    {
        $model = new TransaksiModel();
        $modelProduk = new ProdukModel();
        $modelUser = new UserModel();
        $modelDaerah = new DaerahModel();

        $pesanan = $model->where('iduser', session()->get('iduser'))->orderBy('tgl', 'desc')->findAll();
        $produk = $modelProduk->findAll();
        $user = $modelUser->where('iduser', session()->get('iduser'))->first();
        $daerah = $modelDaerah->findAll();

        $data = [
            'pesanan' => $pesanan,
            'produk' => $produk,
            'user' => $user,
            'daerah' => $daerah,
        ];
		return view('user/pesanan/home', $data);
    }

    public function bayar()
    {
        if($this->request->getMethod() == 'post'){
            $model = new TransaksiModel();

            $file = $this->request->getFile('bukti');
            $name = $file->getRandomName();

            $data = [
                'bukti' => $name,
                'status' => 'Menunggu Verifikasi',
            ];

            $model->update($this->request->getGet('idtransaksi'), $data);
            $file->move('./assets/images/bukti', $name);
			return redirect()->to(site_url('user/pesanan'));
            // print_r($_POST);
        } else {
            $model = new TransaksiModel();
            $modelProduk = new ProdukModel();
            $modelUser = new UserModel();
            $modelDaerah = new DaerahModel();

            $pesanan = $model->where('idtransaksi', $this->request->getGet('idtransaksi'))->first();
            $produk = $modelProduk->where('kodeproduk', $pesanan['kodeproduk'])->first();
            $user = $modelUser->where('iduser', $pesanan['iduser'])->first();
            $daerah = $modelDaerah->findAll();
            $data = [
                'pesanan' => $pesanan,
                'produk' => $produk,
                'user' => $user,
                'daerah' => $daerah,
            ];
            return view('user/pesanan/bayar', $data);
        }
    }

    public function terima()
    {
        $model = new TransaksiModel();

        $data = [
            'status' => 'Pesanan Diterima Pelanggan',
        ];

        $model->update($this->request->getGet('idtransaksi'), $data);
        return redirect()->to(site_url('user/pesanan'));
    }
}