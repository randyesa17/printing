<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\DaerahModel;

class Pengiriman extends BaseController
{
	public function index()
	{
		$model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();

		$pesanan = $model->where('status', 'Dikirim')->findAll();
		$user = $modelUser->findAll();
		$produk = $modelProduk->findAll();
		$data = [
			'judul' => 'Data Pengiriman',
			'pesanan' => $pesanan,
			'user' => $user,
			'produk' => $produk,
			'no' => 1,
		];

		return view('admin/pengiriman/home', $data);
	}

	public function generateQR()
	{
		$idtransaksi = $this->request->getGet('idtransaksi');
		if (file_exists(site_url('assets/images/qr/' . $idtransaksi . '.png'))) {
			$qrcode = $idtransaksi . ".png";
		} else {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = 'assets/images/qr/cache/'; //string, the default is application/cache/
			$config['errorlog']     = 'assets/images/qr/error/'; //string, the default is application/logs/
			$config['imagedir']     = 'assets/images/qr'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name = $idtransaksi . '.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = 'https://localhost/user/pesanan/detail?idtransaksi=' . $idtransaksi;; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		}

		return redirect()->to(site_url('assets/images/qr/' . $idtransaksi . '.png'));
		// return redirect()->to(site_url('admin/pengiriman/pesan/kirim'));
	}

	public function kirimWA()
	{
		$model = new TransaksiModel();
		$modelUser = new UserModel();

		$pesanan = $model->where('idtransaksi', $this->request->getGet('idtransaksi'))->first();
		$user = $modelUser->where('iduser', $pesanan['iduser'])->first();


		$curl = curl_init();
		$token = "4lvKziwp4kXO7m4ZKEDA8qDF8kdE5Dj8M9h8WrinehW8QiDJ0THRFryXoWYcpaRs";
		$data = [
			'phone' => $user['telp'],
			'caption' => 'Barang Sudah Dikirim. Silahkan Scan Barcode Ini Untuk Mengetahui Detail Pesanan Anda. Terima Kasih Telah Membeli di Toko Kami', // can be null
			'image' => 'https://esaproduction.000webhostapp.com/temp/' . $this->request->getGet('idtransaksi') . '.png',
			'secret' => false, // or true
			'priority' => false, // or true
		];

		curl_setopt(
			$curl,
			CURLOPT_HTTPHEADER,
			array(
				"Authorization: $token",
			)
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL, "https://cepogo.wablas.com/api/send-image");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);

		echo "<pre>";
		print_r($result);

		// $curl = curl_init();
		// $token = "M15qOaRAfRtj0sS2K99zr14uByhRlBU3BG37Xps0lTvvyIGGmRZTbOtFogVXVzaa";
		// $data = [
		// 	'phone' => $user['telp'],
		// 	'message' => 'Barang anda sedang dikirim',
		// 	'secret' => false, // or true
		// 	'priority' => false, // or true
		// ];

		// curl_setopt(
		// 	$curl,
		// 	CURLOPT_HTTPHEADER,
		// 	array(
		// 		"Authorization: $token",
		// 	)
		// );
		// curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		// curl_setopt($curl, CURLOPT_URL, "https://tx.wablas.com/api/send-message");
		// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		// $result = curl_exec($curl);
		// curl_close($curl);

		// echo "<pre>";
		// print_r($result);
	}
}