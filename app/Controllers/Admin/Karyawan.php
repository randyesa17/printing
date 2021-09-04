<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    public function index()
	{
		$model = new KaryawanModel();

		$karyawan = $model->findAll();

		$data = [
			'judul' => 'Data Karyawan',
			'no' => 1,
			'karyawan' => $karyawan,
		];
		return view('admin/karyawan/home', $data);
	}

    public function tambah()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new KaryawanModel();

            $data = [
                'nama' => $this->request->getPost('nama'),
                'kodekaryawan' => $this->request->getPost('kode'),
                'jabatan' => $this->request->getPost('jabatan'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
                'telp' => $this->request->getPost('telp'),
            ];

            $model->insert($data);
            if (!$model->errors()) {
                return redirect()->to(site_url('admin/karyawan'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', 'Gagal Menambah Karyawan');
                return redirect()->to(site_url('admin/karyawan/tambah'));
            }
        } else {
            $db = \Config\Database::connect();

            $sql = "SELECT max(kodekaryawan) as kodeTerbesar FROM karyawan";
            $result = $db->query($sql);
            $row = $result->getResult('array');
            $kodeKaryawan = $row[0]['kodeTerbesar'];
            $urutan = (int) substr($kodeKaryawan, 2, 3);
            $urutan++;

            $huruf = "K";
            $kodeBarang = $huruf . sprintf("%03s", $urutan);
            $data = [
                'judul' => 'Tambah Data Karyawan',
                'kode' => $kodeBarang,
            ];
            return view('admin/karyawan/tambah', $data);
        }
    }

    public function ubah()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new KaryawanModel();

            $data = [
                'nama' => $this->request->getPost('nama'),
                'jabatan' => $this->request->getPost('jabatan'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
                'telp' => $this->request->getPost('telp'),
            ];


            $model->update($this->request->getPost('kode'), $data);
            if (!$model->errors()) {
                return redirect()->to(site_url('admin/karyawan'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/karyawan/ubah/' . $this->request->getPost('kode')));
            }
            // print_r($data);
        } else {
            $model = new KaryawanModel();

            $karyawan = $model->where('kodekaryawan', $this->request->getGet('kode'))->first();
            $data = [
                'judul' => 'Ubah Data Karyawan',
                'karyawan' => $karyawan,
            ];
            return view('admin/karyawan/ubah', $data);
        }
    }

    public function hapus()
    {
        $model = new KaryawanModel();

        $model->delete($this->request->getGet('kode'));
        return redirect()->to(site_url('admin/karyawan'));
    }
}