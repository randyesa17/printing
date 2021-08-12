<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SatuanModel;

class Satuan extends BaseController
{
    public function index()
    {
        $model = new SatuanModel();

        $satuan = $model->findAll();
        $data = [
            'judul' => 'Data Satuan Produk',
            'satuan' => $satuan,
            'no' => 1,
        ];

        return view('admin/satuan/home', $data);
    }

    public function tambah()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new SatuanModel();

            $data = [
                'satuan' => $this->request->getPost('satuan'),
            ];

            $model->insert($data);
            if (!$model->errors()) {
                return redirect()->to(site_url('admin/satuan'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', 'Gagal Menambahkan');
                return redirect()->to(site_url('admin/satuan/tambah'));
            }
        } else {
            $data = [
                'judul' => 'Tambah Data Satuan Produk',
            ];
            return view('admin/satuan/tambah', $data);
        }
    }

    public function hapus()
    {
        $model = new SatuanModel();

        $model->delete($this->request->getGet('idsatuan'));
        return redirect()->to(site_url('admin/satuan'));
    }
}