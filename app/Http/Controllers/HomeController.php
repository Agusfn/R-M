<?php

namespace App\Http\Controllers;

use App\Product;
use App\CarouselItem;
use Illuminate\Http\Request;
use CyrildeWit\EloquentViewable\Support\Period;

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
        $carouselItems = CarouselItem::all();
    
        $embalajeFeatured = Product::withCategory()->where("category_id", 1)->OrderByTopViews()->limit(15)->get();
        $polietilenoFeatured = Product::withCategory()->where("category_id", 2)->OrderByTopViews()->limit(15)->get();
        $descartablesFeatured = Product::withCategory()->where("category_id", 3)->OrderByTopViews()->limit(15)->get();
        $libreriaFeatured = Product::withCategory()->where("category_id", 4)->OrderByTopViews()->limit(15)->get();
        $papeleriaFeatured = Product::withCategory()->where("category_id", 5)->OrderByTopViews()->limit(15)->get();

        $mostViewedProducts = Product::withCategory()->orderByViews('desc', Period::pastDays(14))->limit(9)->get();

        $mostRecent = Product::withCategory()->orderBy("updated_at", "DESC")->limit(5)->get();

        return view('home')->with([
            "carouselItems" => $carouselItems,
            "embalajeFeatured" => $embalajeFeatured,
            "polietilenoFeatured" => $polietilenoFeatured,
            "descartablesFeatured" => $descartablesFeatured,
            "libreriaFeatured" => $libreriaFeatured,
            "papeleriaFeatured" => $papeleriaFeatured,
            "mostViewedProducts" => $mostViewedProducts,
            "mostRecent" => $mostRecent
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

        // send message

        $request->session()->flash('success', 1);
        return redirect()->back();
    }


}
