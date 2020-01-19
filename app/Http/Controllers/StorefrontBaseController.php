<?php

namespace App\Http\Controllers;

use App\Category;
use App\Lib\Storefront\FeaturedItems;
use Illuminate\Support\Facades\View;

class StorefrontBaseController extends Controller
{
	

	public function __construct()
	{
		View::share("featuredItems", (new FeaturedItems()));
		View::share("categories", Category::with("subcategories")->get());
	}


}
