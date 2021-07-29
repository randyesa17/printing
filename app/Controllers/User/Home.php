<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
// use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		return view('user/home');
	}
}