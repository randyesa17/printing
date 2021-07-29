<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
// use App\Models\AdminModel;

class Home extends BaseController
{
	public function index()
	{
		return view('admin/home');
	}
}