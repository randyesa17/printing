<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\DaerahModel;

class Pesanan extends BaseController
{
    public function index()
	{
		$model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();

        $transaksi = $model->where(['idgroup !=' => 0])->orderBy('idgroup', 'desc')->findAll();
        foreach ($transaksi as $key => $value) {
            $groups[$key] = $value['idgroup'];
        }

		$pesanan = $model->orderBy('tgl', 'desc')->findAll();
		$user = $modelUser->findAll();
		$produk = $modelProduk->findAll();
		$data = [
			'judul' => 'Data Transaksi Pesanan',
			'pesanan' => $pesanan,
			'user' => $user,
			'produk' => $produk,
            'no' => 1,
		];

		return view('admin/pesanan/home', $data);
	}

    public function verifikasi()
    {
		$model = new TransaksiModel();

        $data = [
            'status' => 'Diproses',
        ];

        $transaksi = $model->where('idtransaksi', $this->request->getGet('idtransaksi'))->first();
        
        $model->update($this->request->getGet('idtransaksi'), $data);
        return redirect()->to(site_url('admin/transaksi/WAverif?idtransaksi='. $this->request->getGet('idtransaksi')));
    }

    public function verifikasis()
    {
		$model = new TransaksiModel();

        $transaksi = $model->where('idgroup', $this->request->getGet('idgroup'))->findAll();

        foreach ($transaksi as $key => $value) {
            $data = [
                'status' => 'Diproses',
            ];
    
            $model->update($this->request->getGet('idtransaksi'), $data);
        }
        
        return redirect()->to(site_url('admin/transaksi/WAverifs?idgroup='. $this->request->getGet('idgroup')));
    }

    public function kirim()
    {
		$model = new TransaksiModel();

        $data = [
            'status' => 'Dikirim',
        ];

        $model->update($this->request->getGet('idtransaksi'), $data);
        return redirect()->to(site_url('admin/transaksi/WAkirim?idtransaksi='.$this->request->getGet('idtransaksi')));
    }

    public function kirims()
    {
		$model = new TransaksiModel();

        $transaksi = $model->where('idgroup', $this->request->getGet('idgroup'))->findAll();

        foreach ($transaksi as $key => $value) {
            $data = [
                'status' => 'Dikirim',
            ];
    
            $model->update($value['idtransaksi'], $data);
        }
       
        return redirect()->to(site_url('admin/transaksi/WAkirims?idgroup='.$this->request->getGet('idgroup')));
    }

    public function WAverif()
    {
        $model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();

		$pesanan = $model->where('idtransaksi', $this->request->getGet('idtransaksi'))->first();
		$produk = $modelProduk->where('kodeproduk', $pesanan['kodeproduk'])->first();
		$user = $modelUser->where('iduser', $pesanan['iduser'])->first();
        
        $curl = curl_init();
		$token = "4lvKziwp4kXO7m4ZKEDA8qDF8kdE5Dj8M9h8WrinehW8QiDJ0THRFryXoWYcpaRs";
		$data = [
			'phone' => $user['telp'],
			'message' => 'Pembayaran Pesanan Anda Berhasil',
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
		curl_setopt($curl, CURLOPT_URL, "https://cepogo.wablas.com/api/send-message");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);

		echo "<pre>";
		print_r($result);
        return redirect()->to(site_url('admin/transaksi'));
    }

    public function WAverifs()
    {
        $model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();

		$pesanan = $model->where('idgroup', $this->request->getGet('idgroup'))->first();
		$produk = $modelProduk->where('kodeproduk', $pesanan['kodeproduk'])->first();
		$user = $modelUser->where('iduser', $pesanan['iduser'])->first();
        
        $curl = curl_init();
		$token = "4lvKziwp4kXO7m4ZKEDA8qDF8kdE5Dj8M9h8WrinehW8QiDJ0THRFryXoWYcpaRs";
		$data = [
			'phone' => $user['telp'],
			'message' => 'Pembayaran Pesanan Anda Berhasil',
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
		curl_setopt($curl, CURLOPT_URL, "https://cepogo.wablas.com/api/send-message");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);

		echo "<pre>";
		print_r($result);
        return redirect()->to(site_url('admin/transaksi'));
    }

    public function WAkirim()
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

        return redirect()->to(site_url('admin/transaksi'));
	}

    public function WAkirims()
	{
		$model = new TransaksiModel();
		$modelUser = new UserModel();

		$pesanan = $model->where('idgroup', $this->request->getGet('idgroup'))->first();
		$user = $modelUser->where('iduser', $pesanan['iduser'])->first();


		$curl = curl_init();
		$token = "4lvKziwp4kXO7m4ZKEDA8qDF8kdE5Dj8M9h8WrinehW8QiDJ0THRFryXoWYcpaRs";
		$data = [
			'phone' => $user['telp'],
			'caption' => 'Barang Sudah Dikirim. Silahkan Scan Barcode Ini Untuk Mengetahui Detail Pesanan Anda. Terima Kasih Telah Membeli di Toko Kami', // can be null
			'image' => 'https://esaproduction.000webhostapp.com/temp/' . $pesanan['idtransaksi'] . '.png',
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

        return redirect()->to(site_url('admin/transaksi'));
	}
}