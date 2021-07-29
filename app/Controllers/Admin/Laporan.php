<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\DaerahModel;

class Laporan extends BaseController
{
    public function index()
	{
		$model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();

        $db = \Config\Database::connect();
		$sql = "SELECT * FROM transaksi WHERE status != 'Belum Dibayar' AND status != 'Menunggu Verifikasi'";
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
            $sql = "SELECT * FROM transaksi WHERE kodeproduk='$kodeproduk' AND status != 'Belum Dibayar' AND status != 'Menunggu Verifikasi'";
            $result = $db->query($sql);
            $pesanan = $result->getResult('array');
            foreach ($pesanan as $keyP => $valueP) {
                $total = $total + $valueP['totalbiaya'];
                $terjual = $terjual + $valueP['jumlah'];
                $jumlahProduk++;
            }
            $produk[$key]['jumlah'] = $jumlahProduk;
            $produk[$key]['total'] = $total;
            $produk[$key]['terjual'] = $terjual;
        }
        $total = 0;
        foreach ($transaksi as $key => $value) {
            $total = $total + $value['totalbiaya'];
        }
        // echo "<pre>";
        // print_r($produk);
        // echo "</pre>";
		$data = [
			'judul' => 'Laporan Produk',
			'pesanan' => $pesanan,
			'transaksi' => $transaksi,
			'user' => $user,
			'produk' => $produk,
			'total' => $total,
            'no' => 1,
		];

		return view('admin/laporan', $data);
	}

    public function cari()
	{
		$model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();
        $awal = $this->request->getPost('awal');
        $sampai = $this->request->getPost('sampai');

        $db = \Config\Database::connect();
		$sql = "SELECT * FROM transaksi WHERE tgl BETWEEN '$awal' AND '$sampai' AND status != 'Belum Dibayar' AND status != 'Menunggu Verifikasi'";
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
            $sql = "SELECT * FROM transaksi WHERE tgl BETWEEN '$awal' AND '$sampai' AND kodeproduk='$kodeproduk' AND status != 'Belum Dibayar' AND status != 'Menunggu Verifikasi'";
            $result = $db->query($sql);
            $pesanan = $result->getResult('array');
            foreach ($pesanan as $keyP => $valueP) {
                $total = $total + $valueP['totalbiaya'];
                $terjual = $terjual + $valueP['jumlah'];
                $jumlahProduk++;
            }
            $produk[$key]['jumlah'] = $jumlahProduk;
            $produk[$key]['total'] = $total;
            $produk[$key]['terjual'] = $terjual;
        }
        $total = 0;
        foreach ($transaksi as $key => $value) {
            $total = $total + $value['totalbiaya'];
        }
        // echo "<pre>";
        // print_r($produk);
        // echo "</pre>";
		$data = [
			'judul' => 'Laporan Produk dari Tanggal '.date("d-m-Y",strtotime($awal)).' Sampai Tanggal '.date("d-m-Y",strtotime($sampai)),
			'pesanan' => $pesanan,
			'transaksi' => $transaksi,
			'user' => $user,
			'produk' => $produk,
			'total' => $total,
            'no' => 1,
		];

		return view('admin/laporan', $data);
	}
}