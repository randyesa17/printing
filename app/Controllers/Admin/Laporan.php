<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\DaerahModel;

class Laporan extends BaseController
{
    public function penjualan()
	{
		$model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();

        $db = \Config\Database::connect();
		$sql = "SELECT * FROM transaksi WHERE status != 'Belum Bayar' AND status != 'Menunggu Verifikasi'";
		$result = $db->query($sql);
		$transaksi = $result->getResult('array');
        // $hitung = $result->getNumRows();
		$user = $modelUser->findAll();
		$produk = $modelProduk->findAll();
        foreach ($produk as $key => $value) {
            $kodeproduk = $value['kodeproduk'];
            $jumlahProduk = 0;
            $total = 0;
            $terjual = 0;   
            $sql = "SELECT * FROM transaksi WHERE kodeproduk='$kodeproduk' AND status != 'Belum Bayar' AND status != 'Menunggu Verifikasi'";
            $result = $db->query($sql);
            $pesanan = $result->getResult('array');
            foreach ($pesanan as $keyP => $valueP) {
                $total = $total + $valueP['totalharga'] ;
                $terjual = $terjual + $valueP['jumlah'];
                $jumlahProduk++;
            }
            $produk[$key]['jumlah'] = $jumlahProduk;
            $produk[$key]['total'] = $total;
            $produk[$key]['terjual'] = $terjual;
        }
        $total = 0;
        foreach ($transaksi as $key => $value) {
            $total = $total + $value['totalharga'] ;
        }
        // echo "<pre>";
        // print_r($produk);
        // echo "</pre>";
		$data = [
			'judul' => 'Laporan Penjualan Produk',
			'pesanan' => $pesanan,
			'transaksi' => $transaksi,
			'user' => $user,
			'produk' => $produk,
			'total' => $total,
            'no' => 1,
		];

		return view('admin/laporan/penjualan', $data);
	}

    public function pemesanan()
	{
		$model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();

		$db = \Config\Database::connect();
		$sql = "SELECT * FROM transaksi WHERE status != 'Belum Bayar' AND status != 'Menunggu Verifikasi'";
		$result = $db->query($sql);
		$transaksi = $result->getResult('array');
		$user = $modelUser->findAll();
		$produk = $modelProduk->findAll();
        foreach ($produk as $key => $value) {
            $kodeproduk = $value['kodeproduk'];
            $jumlahProduk = 0;
            $total = 0;
            $terjual = 0;   
            $sql = "SELECT * FROM transaksi WHERE kodeproduk='$kodeproduk' AND status != 'Belum Bayar' AND status != 'Menunggu Verifikasi'";
            $result = $db->query($sql);
            $pesanan = $result->getResult('array');
            foreach ($pesanan as $keyP => $valueP) {
                $total = $total + $valueP['totalharga'];
                $terjual = $terjual + $valueP['jumlah'];
                $jumlahProduk++;
            }
            $produk[$key]['jumlah'] = $jumlahProduk;
            $produk[$key]['total'] = $total;
            $produk[$key]['terjual'] = $terjual;
        }
        $total = 0;
        foreach ($transaksi as $key => $value) {
            $total = $total + $value['totalharga'];
        }
		$data = [
			'judul' => 'Laporan Transaksi Pemesanan',
			'pesanan' => $pesanan,
			'transaksi' => $transaksi,
			'user' => $user,
            'total' => $total,
			'produk' => $produk,
            'no' => 1,
		];

		return view('admin/laporan/pemesanan', $data);
	}

    public function cari()
	{
		$model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();
        $awal = $this->request->getPost('awal');
        $sampai = $this->request->getPost('sampai');

        $db = \Config\Database::connect();
        $sql = "SELECT * FROM transaksi WHERE tgl BETWEEN '$awal' AND '$sampai' AND status != 'Belum Bayar' AND status != 'Menunggu Verifikasi'";
        $result = $db->query($sql);
        $transaksi = $result->getResult('array');
        // $hitung = $result->getNumRows();
        $user = $modelUser->findAll();
        $produk = $modelProduk->findAll();
        foreach ($produk as $key => $value) {
            $kodeproduk = $value['kodeproduk'];
            $jumlahProduk = 0;
            $total = 0;
            $terjual = 0;   
            $sql = "SELECT * FROM transaksi WHERE tgl BETWEEN '$awal' AND '$sampai' AND kodeproduk='$kodeproduk' AND status != 'Belum Bayar' AND status != 'Menunggu Verifikasi'";
            $result = $db->query($sql);
            $pesanan = $result->getResult('array');
            foreach ($pesanan as $keyP => $valueP) {
                $total = $total + $valueP['totalharga'] ;
                $terjual = $terjual + $valueP['jumlah'];
                $jumlahProduk++;
            }
            $produk[$key]['jumlah'] = $jumlahProduk;
            $produk[$key]['total'] = $total;
            $produk[$key]['terjual'] = $terjual;
        }
        $total = 0;
        foreach ($transaksi as $key => $value) {
            $total = $total + $value['totalharga'] ;
        }
        // echo "<pre>";
        // print_r($produk);
        // echo "</pre>";
        $data = [
            'judul' => 'Laporan dari Tanggal '.date("d-m-Y",strtotime($awal)).' Sampai Tanggal '.date("d-m-Y",strtotime($sampai)),
            'pesanan' => $pesanan,
            'transaksi' => $transaksi,
            'user' => $user,
            'produk' => $produk,
            'total' => $total,
            'no' => 1,
        ];
        if ($this->request->getGet('laporan') == 'penjualan') {
            return view('admin/laporan/penjualan', $data);
        } else {
            return view('admin/laporan/pemesanan', $data);
        }
        
	}
}