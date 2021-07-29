<?php

namespace App\Controllers;
use App\Models\ProdukModel;

class Home extends BaseController
{
	public function index()
	{
		return view('home');
	}

	public function produk()
	{
		$model = new ProdukModel();

		$produk = $model->findAll();
		$data = [
			'produk' => $produk,
		];
		return view('produk', $data);
	}

	public function cara()
	{
		return view('cara');
	}
}