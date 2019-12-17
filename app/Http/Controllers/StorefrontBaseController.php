<?php

namespace App\Http\Controllers;

use App\Category;
use App\Lib\Storefront\FeaturedItems;
use Illuminate\Support\Facades\View;

class StorefrontBaseController extends Controller
{
	

	public function __construct()
	{
		$featuredItems = new FeaturedItems();
		$categories = Category::with("subcategories")->get();

		View::share("featuredItems", $featuredItems);
		View::share("categories", $categories);
	}


}
