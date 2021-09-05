<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\DaerahModel;
use App\Models\SatuanModel;

class Pesanan extends BaseController
{
    public function masuk()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new TransaksiModel();
            $modelKeranjang = new KeranjangModel();
            $modelProduk = new ProdukModel();
            $modelUser = new UserModel();
            $modelDaerah = new DaerahModel();

            // if ($this->request->getPost('telp') != '' && $this->request->getPost('alamat') != '') {
            //     $dataUser = [
            //         'alamat' => $this->request->getPost('alamat'),
            //         'telp' => $this->request->getPost('telp'),
            //     ];

            //     $modelUser->update($this->request->getPost('iduser'), $dataUser);
            // }

            // $retur = 1;
            // $file = $this->request->getFile('desain');
            // if (!empty($file)) {
            //     $name = $file->getRandomName();
            //     $retur = 0;
            // } else {
            //     $produk = $modelProduk->find($this->request->getPost('kodeproduk'));
            //     if ($this->request->getPost('desain') == "desain1") {
            //         $name = $produk['desain1'];
            //     } elseif ($this->request->getPost('desain') == "desain2") {
            //         $name = $produk['desain2'];
            //     } elseif ($this->request->getPost('desain') == "desain3") {
            //         $name = $produk['desain3'];
            //     }
            // }

            $keranjang = $modelKeranjang->where('idkeranjang', $this->request->getPost('idkeranjang'))->first();

            $data = [
                'idtransaksi' => $this->request->getPost('idtransaksi'),
                'iduser' => session()->get('iduser'),
                'kodeproduk' => $keranjang['kodeproduk'],
                'p' => $keranjang['p'],
                'l' => $keranjang['l'],
                'jumlah' => $keranjang['jumlah'],
                'totalharga' => $this->request->getPost('totalharga'),
                'desain' => $keranjang['desain'],
                'ket' => $keranjang['keterangan'],
                'tambahan' => $keranjang['tambahan'],
                'kodepos' => $this->request->getPost('kodepos'),
                'ongkir' => $this->request->getPost('ongkir'),
                'totalbiaya' => $this->request->getPost('total'),
                'status' => 'Belum Bayar',
            ];

            $model->insert($data);
            // if (!empty($file))
            //     $file->move('./assets/images/desain', $name);
            $modelKeranjang->delete($this->request->getPost('idkeranjang'));
            return redirect()->to(site_url('user/pesanan/WAbayar?idtransaksi=' . $this->request->getPost('idtransaksi')));
            // print_r($data);
        }
    }

    public function masuks()
    {

        if ($this->request->getMethod() == 'post') {
            $model = new TransaksiModel();
            $modelKeranjang = new KeranjangModel();
            $modelProduk = new ProdukModel();
            $modelUser = new UserModel();
            $modelDaerah = new DaerahModel();

            $transaksi = $model->orderBy('idgroup', 'desc')->first();
            if (!empty($transaksi)) {
                $idgroup = $transaksi['idgroup']+1;
            } else {
                $idgroup = 1;
            }
            
            $banyak = $this->request->getPost('banyak');

            for ($i=1; $i < $banyak; $i++) { 
                $keranjang = $modelKeranjang->where('idkeranjang', $this->request->getPost('idkeranjang'.$i))->first();

                $data = [
                    'idtransaksi' => $this->request->getPost('idtransaksi'.$i),
                    'iduser' => session()->get('iduser'),
                    'idgroup' => $idgroup,
                    'kodeproduk' => $keranjang['kodeproduk'],
                    'p' => $keranjang['p'],
                    'l' => $keranjang['l'],
                    'jumlah' => $keranjang['jumlah'],
                    'totalharga' => $this->request->getPost('totalharga'.$i),
                    'desain' => $keranjang['desain'],
                    'ket' => $keranjang['keterangan'],
                    'tambahan' => $keranjang['tambahan'],
                    'kodepos' => $this->request->getPost('kodepos'),
                    'status' => 'Belum Bayar',
                ];
    
                $model->insert($data);
                $modelKeranjang->delete($this->request->getPost('idkeranjang'.$i));
            }

            $keranjang = $modelKeranjang->where('idkeranjang', $this->request->getPost('idkeranjang'.$banyak))->first();

            $data = [
                'idtransaksi' => $this->request->getPost('idtransaksi'.$banyak),
                'iduser' => session()->get('iduser'),
                'idgroup' => $idgroup,
                'kodeproduk' => $keranjang['kodeproduk'],
                'p' => $keranjang['p'],
                'l' => $keranjang['l'],
                'jumlah' => $keranjang['jumlah'],
                'totalharga' => $this->request->getPost('totalharga'.$banyak),
                'desain' => $keranjang['desain'],
                'ket' => $keranjang['keterangan'],
                'tambahan' => $keranjang['tambahan'],
                'kodepos' => $this->request->getPost('kodepos'),
                'ongkir' => $this->request->getPost('ongkir'),
                'totalbiaya' => $this->request->getPost('total'),
                'status' => 'Belum Bayar',
            ];

            $model->insert($data);
            $modelKeranjang->delete($this->request->getPost('idkeranjang'.$banyak));
        //     if (!empty($file))
        //         $file->move('./assets/images/desain', $name);
        //     $modelKeranjang->delete($this->request->getPost('idkeranjang'));
            return redirect()->to(site_url('user/pesanan/WAbayars?idgroup=' . $idgroup));
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        }
    }

    public function index()
    {
        $model = new TransaksiModel();
        $modelProduk = new ProdukModel();
        $modelUser = new UserModel();
        $modelDaerah = new DaerahModel();

        $transaksi = $model->where(['iduser' => session()->get('iduser'), 'idgroup !=' => 0])->orderBy('idgroup', 'desc')->findAll();
        foreach ($transaksi as $key => $value) {
            $groups[$key] = $value['idgroup'];
        }

        $pesanan = $model->where('iduser', session()->get('iduser'))->orderBy('tgl', 'desc')->findAll();
        $produk = $modelProduk->findAll();
        $user = $modelUser->where('iduser', session()->get('iduser'))->first();
        $daerah = $modelDaerah->findAll();

        // foreach ($pesanan as $key => $value) {
        //     if ($value['idgroup'] != 0) {
        //         $pesanan[$key]['group'.] 
        //     }
        // }

        $data = [
            'pesanan' => $pesanan,
            'produk' => $produk,
            'user' => $user,
            'daerah' => $daerah,
        ];
        // echo "<pre>";
        // print_r($pesanan);
        return view('user/pesanan/home', $data);
    }

    public function bayar()
    {
        if ($this->request->getMethod() == 'post') {
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
            $modelSatuan = new SatuanModel();

            $pesanan = $model->where('idtransaksi', $this->request->getGet('idtransaksi'))->first();
            $produk = $modelProduk->where('kodeproduk', $pesanan['kodeproduk'])->first();
            $user = $modelUser->where('iduser', $pesanan['iduser'])->first();
            $daerah = $modelDaerah->findAll();
            $satuan = $modelSatuan->findAll();
            $data = [
                'pesanan' => $pesanan,
                'produk' => $produk,
                'user' => $user,
                'daerah' => $daerah,
                'satuan' => $satuan,
            ];
            return view('user/pesanan/bayar', $data);
        }
    }

    public function bayars()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new TransaksiModel();

            $file = $this->request->getFile('bukti');
            $name = $file->getRandomName();
            $pesanan = $model->where('idgroup', $this->request->getGet('idgroup'))->findAll();

            $data = [
                'bukti' => $name,
                'status' => 'Menunggu Verifikasi',
            ];

            foreach ($pesanan as $key => $value) {
                $model->update($value['idtransaksi'], $data);
            }
            $file->move('./assets/images/bukti', $name);
            return redirect()->to(site_url('user/pesanan'));
            // print_r($_POST);
        } else {
            $model = new TransaksiModel();
            $modelProduk = new ProdukModel();
            $modelUser = new UserModel();
            $modelDaerah = new DaerahModel();
            $modelSatuan = new SatuanModel();

            $pesanan = $model->where('idgroup', $this->request->getGet('idgroup'))->orderBy('totalbiaya', 'desc')->findAll();
            $produk = $modelProduk->findAll();
            $user = $modelUser->where('iduser', $pesanan[0]['iduser'])->first();
            $daerah = $modelDaerah->findAll();
            $satuan = $modelSatuan->findAll();
            $data = [
                'pesanan' => $pesanan,
                'produk' => $produk,
                'user' => $user,
                'daerah' => $daerah,
                'satuan' => $satuan,
            ];
            return view('user/pesanan/bayars', $data);
        }
    }
    
    public function detail()
    {
        $model = new TransaksiModel();
        $modelProduk = new ProdukModel();
        $modelUser = new UserModel();
        $modelDaerah = new DaerahModel();
        $modelSatuan = new SatuanModel();

        $pesanan = $model->where('idtransaksi', $this->request->getGet('idtransaksi'))->first();
        $produk = $modelProduk->where('kodeproduk', $pesanan['kodeproduk'])->first();
        $user = $modelUser->where('iduser', $pesanan['iduser'])->first();
        $daerah = $modelDaerah->findAll();
        $satuan = $modelSatuan->findAll();
        $data = [
            'pesanan' => $pesanan,
            'produk' => $produk,
            'user' => $user,
            'daerah' => $daerah,
            'satuan' => $satuan,
        ];
        return view('user/pesanan/detail', $data);
    }

    public function details()
    {
        $model = new TransaksiModel();
            $modelProduk = new ProdukModel();
            $modelUser = new UserModel();
            $modelDaerah = new DaerahModel();
            $modelSatuan = new SatuanModel();

            $pesanan = $model->where('idgroup', $this->request->getGet('idgroup'))->orderBy('totalbiaya', 'desc')->findAll();
            $produk = $modelProduk->findAll();
            $user = $modelUser->where('iduser', $pesanan[0]['iduser'])->first();
            $daerah = $modelDaerah->findAll();
            $satuan = $modelSatuan->findAll();
            $data = [
                'pesanan' => $pesanan,
                'produk' => $produk,
                'user' => $user,
                'daerah' => $daerah,
                'satuan' => $satuan,
            ];
            return view('user/pesanan/details', $data);
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

    public function terimas()
    {
        $model = new TransaksiModel();

        $pesanan = $model->where('idgroup', $this->request->getGet('idgroup'))->findAll();

        foreach ($pesanan as $key => $value) {
            $data = [
                'status' => 'Pesanan Diterima Pelanggan',
            ];
    
            $model->update($value['idtransaksi'], $data);
        }
        
        return redirect()->to(site_url('user/pesanan'));
    }

    public function WAbayar()
    {
        $model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();

		$pesanan = $model->where('idtransaksi', $this->request->getGet('idtransaksi'))->first();
		$produk = $modelProduk->where('kodeproduk', $pesanan['kodeproduk'])->first();
		$user = $modelUser->where('iduser', $pesanan['iduser'])->first();

        $pesan = "Silahkan Bayar Pesanan Anda\n
        Produk : ".$produk['namaproduk']."\n
        Jumlah : ".number_format($pesanan['jumlah'])."\n
        Harga : ".number_format($pesanan['totalharga'])."\n
        Ongkir : ".number_format($pesanan['ongkir'])."\n
        Total Biaya: ".number_format($pesanan['totalbiaya'])."\n
        Silahkan Transfer ke Bank Syariah Mandiri\n
        No Rekening : 7112893201. A.n Emmily";
        $curl = curl_init();
		$token = "4lvKziwp4kXO7m4ZKEDA8qDF8kdE5Dj8M9h8WrinehW8QiDJ0THRFryXoWYcpaRs";
		$data = [
			'phone' => $user['telp'],
			'message' => $pesan,
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
        return redirect()->to(site_url('user/pesanan/bayar?idtransaksi=' . $this->request->getGet('idtransaksi')));
    }

    public function WAbayars()
    {
        $model = new TransaksiModel();
		$modelUser = new UserModel();
		$modelProduk = new ProdukModel();

        $pesan = "Silahkan Bayar Pesanan Anda\n";
        $ongkir = 0;
        $biaya = 0;
		$pesanan = $model->where('idgroup', $this->request->getGet('idgroup'))->findAll();
        foreach ($pesanan as $key => $value) {
            $produk = $modelProduk->where('kodeproduk', $value['kodeproduk'])->first();
		    $user = $modelUser->where('iduser', $value['iduser'])->first();
            $produk = "--------------------\n
            Produk : ".$produk['namaproduk']."\n
            Jumlah : ".number_format($value['jumlah'])."\n
            Harga : ".number_format($value['totalharga'])."\n";
            $pesan = $pesan . $produk;
            if (!empty($value['ongkir'])) {
                $ongkir = $value['ongkir'];
            }
            if (!empty($value['totalbiaya'])) {
                $biaya = $value['totalbiaya'];
            }
        }
		

        $pesan = $pesan . "
        Ongkir : ".number_format($ongkir)."\n
        Total Biaya: ".number_format($biaya)."\n
        Silahkan Transfer ke Bank Syariah Mandiri\n
        No Rekening : 7112893201. A.n Emmily";
        $curl = curl_init();
		$token = "4lvKziwp4kXO7m4ZKEDA8qDF8kdE5Dj8M9h8WrinehW8QiDJ0THRFryXoWYcpaRs";
		$data = [
			'phone' => $user['telp'],
			'message' => $pesan,
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
		print_r($data);
        return redirect()->to(site_url('user/pesanan/bayars?idgroup=' . $this->request->getGet('idgroup')));
    }
}