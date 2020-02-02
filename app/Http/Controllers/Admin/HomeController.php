<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends AdminBaseController
{

	public function index()
	{
		return redirect()->route("admin.products.list");
	}


}
