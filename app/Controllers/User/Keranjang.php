<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;
use App\Models\SatuanModel;
use App\Models\UserModel;
use App\Models\DaerahModel;

class Keranjang extends BaseController
{
    public function index()
    {
        $model = new KeranjangModel();
        $modelProduk = new ProdukModel();
        $modelSatuan = new SatuanModel();

        $keranjang = $model->where('iduser', session()->get('iduser'))->findAll();
        $produk = $modelProduk->findAll();
        $satuan = $modelSatuan->findAll();
        $data = [
            'keranjang' => $keranjang,
            'produk' => $produk,
            'satuan' => $satuan,
        ];
        return view('user/keranjang/home', $data);
    }

    public function hapus()
    {
        $model = new KeranjangModel();

        $model->delete($this->request->getGet('idkeranjang'));
        return redirect()->to(site_url('user/keranjang'));
    }

    public function ukuran()
    {
        $model = new KeranjangModel();
        $modelProduk = new ProdukModel();
        $modelSatuan = new SatuanModel();
        if ($this->request->getMethod() == 'post') {
            $data = [
                'p' => $this->request->getPost('p'),
                'l' => $this->request->getPost('l'),
                'jumlah' => $this->request->getPost('jumlah'),
            ];
            $model->update($this->request->getGet('idkeranjang'), $data);
            return redirect()->to(site_url('user/keranjang'));
            // print_r($_POST);
        } else {
            $keranjang = $model->where('idkeranjang', $this->request->getGet('idkeranjang'))->first();
            $produk = $modelProduk->where('kodeproduk', $keranjang['kodeproduk'])->first();
            $satuan = $modelSatuan->findAll();
            $data = [
                'keranjang' => $keranjang,
                'produk' => $produk,
                'satuan' => $satuan,
            ];
            return view('user/keranjang/ukuran', $data);
        }
    }

    public function update()
    {
        print_r($_GET);
        $model = new KeranjangModel();
        $checkoutID = "";

        $banyak = $this->request->getGet('banyak');
        $banyakrecord = 0;
        for ($i = 1; $i <= $banyak; $i++) {
            if (!empty($this->request->getGet('checkidkeranjang' . $i))) {
                $l = "";
                $p = "";
                if (!empty($this->request->getGet('p' . $i))) {
                    $p = $this->request->getGet('p' . $i);
                }
                if (!empty($this->request->getGet('l' . $i))) {
                    $l = $this->request->getGet('l' . $i);
                }
                $data = [
                    'p' => $p,
                    'l' => $l,
                    'jumlah' => $this->request->getGet('jumlah' . $i),
                ];
                $banyakrecord++;
                $model->update($this->request->getGet('idkeranjang' . $i), $data);
                $checkoutID = $checkoutID . "idkeranjang" . $i . "=" . $this->request->getGet('idkeranjang' . $i) . "&";
            }
            // print_r($data);
        }
        $checkoutID = $checkoutID . "banyak=" . $banyakrecord;
        // print_r($checkoutID);

        // $data = [
        //     'jumlah' => $this->request->getGet('jumlah'),
        // ];

        // $model->update($this->request->getGet('idkeranjang'), $data);
        // if (!$model->errors()) {
        return redirect()->to(site_url('user/keranjang/checkout?' . $checkoutID));
        // } else {
        //     $error = $model->errors();
        //     session()->setFlashdata('info', $error);
        //     return redirect()->to(site_url('user/keranjang'));
        // }
    }

    public function checkout()
    {
        $model = new KeranjangModel();
        $modelProduk = new ProdukModel();
        $modelUser = new UserModel();
        $modelDaerah = new DaerahModel();

        $view = "";
        $banyak = $this->request->getGet('banyak');
        if ($banyak == 1) {
            $keranjang = $model->where('idkeranjang', $this->request->getGet('idkeranjang1'))->first();
            $produk = $modelProduk->where('kodeproduk', $keranjang['kodeproduk'])->first();
            $user = $modelUser->where('iduser', $keranjang['iduser'])->first();
            $daerah = $modelDaerah->findAll();
            $view = "user/keranjang/checkout";
            $data = [
                'keranjang' => $keranjang,
                'produk' => $produk,
                'user' => $user,
                'daerah' => $daerah,
                'total' => $keranjang['jumlah'] * $produk['harga'],
                'kode' => 'transaksi' . date('Ymdhis')
            ];
        } else {
            $total = 0;
            for ($i = 1; $i <= $banyak; $i++) {
                $keranjang[$i - 1] = $model->where('idkeranjang', $this->request->getGet('idkeranjang' . $i))->first();
                $produk[$i - 1] = $modelProduk->where('kodeproduk', $keranjang[$i - 1]['kodeproduk'])->first();
                $totalproduk[$i] = $keranjang[$i - 1]['jumlah'] * $produk[$i - 1]['harga'];
                $total = $total + $totalproduk[$i];
                $kode[$i] = "transaksi" . date('Ymdhis') . $i;
            }
            $user = $modelUser->where('iduser', session()->get('iduser'))->first();
            $daerah = $modelDaerah->findAll();
            $view = "user/keranjang/checkouts";
            $data = [
                'keranjang' => $keranjang,
                'produk' => $produk,
                'user' => $user,
                'daerah' => $daerah,
                'totalproduk' => $totalproduk,
                'total' => $total,
                'kode' => $kode,
            ];
            // print_r($total);
        }


        return view($view, $data);
    }
}