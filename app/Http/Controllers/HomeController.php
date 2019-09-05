<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends StorefrontBaseController
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        //parent::__construct();
        //$this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $topRated = Product::with(["category","subcategory"])->limit(7)->get();

        $featured = Product::with(["category","subcategory"])->inRandomOrder()->limit(9)->get();
        $special = Product::with(["category","subcategory"])->inRandomOrder()->limit(5)->get();
        $onsale = Product::with(["category","subcategory"])->inRandomOrder()->limit(5)->get();

        return view('home')->with([
            "featured" => $featured,
            "special" => $special,
            "onsale" => $onsale,
            "topRated" => $topRated
        ]);
    }


    /**
     * Show about us page.
     * @return [type] [description]
     */
    public function aboutUs()
    {
        return view("about-us");
    }


    /**
     * Show contact page.1
     * @return [type] [description]
     */
    public function contact()
    {
        return view("contact");
    }



}
