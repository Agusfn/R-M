<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends StorefrontBaseController
{
    
    /**
     * Show product page.
     * @return [type] [description]
     */
	public function details($code)
	{
		$product = Product::findWithCode($code);

		if(!$product)
			return redirect()->route("home");

		return view("product")->with("product", $product);
	}

}
