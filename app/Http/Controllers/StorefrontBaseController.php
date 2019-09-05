<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\View;

class StorefrontBaseController extends Controller
{
	

	public function __construct()
	{
		$categories = Category::with("subcategories")->get();
		View::share("categories", $categories);
	}


}
