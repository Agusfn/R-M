<?php

namespace App\Http\Controllers;

use App\Product;
use App\CarouselItem;
use Illuminate\Http\Request;
use App\Lib\Storefront\ProductFetch;

class HomeController extends StorefrontBaseController
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carouselItems = CarouselItem::all();
        
        $topViewedProducts = ProductFetch::getTopViewed(9);
        $topViewedProductsByCategory = ProductFetch::getTopViewedFromCategories([1,2,3,4,5], 15);
        $mostRecentProducts = ProductFetch::getMostRecent(5);

        return view('home')->with([
            "carouselItems" => $carouselItems,
            "topViewedProducts" => $topViewedProducts,
            "topViewedProductsByCategory" => $topViewedProductsByCategory,
            "mostRecentProducts" => $mostRecentProducts
        ]);
    }


    /**
     * Show contact page.1
     * @return [type] [description]
     */
    public function contact()
    {
        return view("contact");
    }


    /**
     * Enviar mensaje de contacto.
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function submitMessage(Request $request)
    {
        $request->validate([
            "nombre" => "required",
            "email" => "required|email",
            "mensaje" => "required",
        ]);

        // *************SEND MESSAGE!***************

        $request->session()->flash('success', 1);
        return redirect()->back();
    }


}
