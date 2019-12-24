<?php

namespace App\Http\View\Composers;

use App\Product;
use Illuminate\View\View;
use App\Lib\RecentlyViewedProducts;


class CatalogComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */	
    public function compose(View $view)
	{

		$recentlyViewedProducts = Product::find(RecentlyViewedProducts::getIds());

		if(!$recentlyViewedProducts) 
			$recentlyViewedProducts = [];

		$view->with("recentlyViewedProducts", $recentlyViewedProducts);
	}



}