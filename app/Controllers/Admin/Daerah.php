<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DaerahModel;

class Daerah extends BaseController
{
    public function index()
	{
		$model = new DaerahModel();

		$daerah = $model->findAll();
		$data = [
			'judul' => 'Data Daerah',
			'daerah' => $daerah,
            'no' => 1,
		];

		return view('admin/daerah/home', $data);
	}

    public function tambah()
	{
		if($this->request->getMethod() == 'post'){
            $model = new DaerahModel();

            $data = [
                'namadaerah' => $this->request->getPost('namadaerah'),
                'kodepos' => $this->request->getPost('kodepos'),
                'hargakirim' => $this->request->getPost('hargakirim'),
            ];

            $model->insert($data);
            if(!$model->errors()){
                return redirect()->to(site_url('admin/daerah'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/daerah/tambah'));
            }
		} else {
			$data = [
				'judul' => 'Tambah Data Daerah',
			];
			return view('admin/daerah/tambah', $data);
		}
	}

    public function ubah()
    {
        if($this->request->getMethod() == 'post'){
            $model = new DaerahModel();

            $data = [
                'namadaerah' => $this->request->getPost('namadaerah'),
                'hargakirim' => $this->request->getPost('hargakirim'),
            ];

            $model->update($this->request->getPost('kodepos'), $data);
            if(!$model->errors()){
                return redirect()->to(site_url('admin/daerah'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/daerah/ubah/'.$this->request->getPost('kodepos')));
            }
            // print_r($data);
        } else {
            $model = new DaerahModel();

			$daerah = $model->where('kodepos', $this->request->getGet('kodepos'))->first();
			$data = [
				'judul' => 'Ubah Data Daerah',
				'daerah' => $daerah,
			];
			return view('admin/daerah/ubah', $data);
        }
    }
    
    public function hapus()
    {
        $model = new DaerahModel();

        $model->delete($this->request->getGet('kodepos'));
        return redirect()->to(site_url('admin/daerah'));
    }
}