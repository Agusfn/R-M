<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\CarouselItem;
use App\Lib\Helpers\Images;
use Illuminate\Http\Request;
use App\Lib\Storefront\FeaturedItems;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EditFeaturedItem;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;


class CoverImagesController extends AdminBaseController
{
    

	/**
	 * Mostrar página principal de sección de productos destacados/imágenes promocionales.
	 * @return [type] [description]
	 */
	public function showOverview(FeaturedItems $featuredItems)
	{
		$carouselItems = CarouselItem::all();

		return view("admin.cover-imgs.overview")->with([
			"featuredItems" => $featuredItems,
			"carouselItems" => $carouselItems
		]);	
	}


	/**
	 * Obtener lista total de productos y devolverla como json.
	 * @return [type] [description]
	 */
	public function fetchProducts()
	{
		$products = Product::with(["category","subcategory"])
			->orderBy("category_id", "asc")
			->orderBy("subcategory_id", "asc")
			->orderBy("name", "asc")
			->get();


		foreach($products as $product) {
			$product->url = $product->url();
		}

		return $products;
	}



	public function showNavbarFeaturedForm(FeaturedItems $featuredItems)
	{
		return view("admin.cover-imgs.featured-item")->with([
			"featuredItem" => $featuredItems->navbarFeatured,
			"featuredType" => "navbar"
		]);
	}


	public function changeNavbarFeatured(EditFeaturedItem $request, FeaturedItems $featuredItems)
	{
		$request->validated();

		if($request->mostrar_item == "no") {
			$featuredItems->removeNavbarFeatured();
		}
		else {

			$image = $this->loadImage($request);
			
			if($image instanceof RedirectResponse) {
				return $image;
			}

			$featuredItems->setNavbarFeatured(
				$request->title, 
				$image, 
				$request->has("show_action_btn"), 
				$request->action_btn_text, 
				$request->action_btn_url
			);
		}

		return redirect()->back()->with("success", true);


	}



	/**
	 * Mostrar formulario para modificar imagen destacada superior
	 * @param  FeaturedItems $featuredItems [description]
	 * @return [type]                       [description]
	 */
	public function showSliderOneFeaturedForm(FeaturedItems $featuredItems)
	{
		return view("admin.cover-imgs.featured-item")->with([
			"featuredItem" => $featuredItems->sliderFirstFeatured,
			"featuredType" => "slider1"
		]);
	}


	/**
	 * Modificar imagen destacada superior (primera)
	 * @param  EditFeaturedItem $request       [description]
	 * @param  FeaturedItems    $featuredItems [description]
	 * @return [type]                          [description]
	 */
	public function changeSliderOneFeatured(EditFeaturedItem $request, FeaturedItems $featuredItems)
	{
		$request->validated();

		if($request->mostrar_item == "no") {
			$featuredItems->removeSliderFirstFeatured();
		}
		else {
			$image = $this->loadImage($request);

			if($image instanceof RedirectResponse) {
				return $image;
			}

			$featuredItems->setSliderFirstFeatured(
				$request->title, 
				$image, 
				$request->has("show_action_btn"), 
				$request->action_btn_text, 
				$request->action_btn_url
			);
		
		}

		return redirect()->back()->with("success", true);

	}


	/**
	 * Mostrar formulario para modificar imagen destacada inferior
	 * @param  FeaturedItems $featuredItems [description]
	 * @return [type]                       [description]
	 */
	public function showSliderTwoFeaturedForm(FeaturedItems $featuredItems)
	{
		return view("admin.cover-imgs.featured-item")->with([
			"featuredItem" => $featuredItems->sliderSecondFeatured,
			"featuredType" => "slider2"
		]);
	}



	/**
	 * Modificar imagen destacada inferior
	 * @param  EditFeaturedItem $request       [description]
	 * @param  FeaturedItems    $featuredItems [description]
	 * @return [type]                          [description]
	 */
	public function changeSliderTwoFeatured(EditFeaturedItem $request, FeaturedItems $featuredItems)
	{
		$request->validated();

		if($request->mostrar_item == "no") {
			$featuredItems->removeSliderSecondFeatured();
		}
		else {
			$image = $this->loadImage($request);

			if($image instanceof RedirectResponse) {
				return $image;
			}

			$featuredItems->setSliderSecondFeatured(
				$request->title, 
				$image, 
				$request->has("show_action_btn"), 
				$request->action_btn_text, 
				$request->action_btn_url
			);
				
		}
		
		return redirect()->back()->with("success", true);

	}



	/**
	 * Mostrar formulario para agregar un nuevo item al carousel.
	 * @return [type] [description]
	 */
	public function showAddCarouselItemForm()
	{
		return view("admin.cover-imgs.carousel-items.create-update")->with("carouselItem", null);
	}


	/**
	 * [loadImage description]
	 * @param  [type] $request [description]
	 * @return [type]          [description]
	 */
	private function loadImage($request) 
	{
		$image = null;
		if($request->has("image_type"))
		{
			if($request->image_type == "upload") {
				$image = Image::make($request->file("image_file"));
			}
			else { // url
				if(!$image = Images::loadFromUrl($request->image_url)) {
					return redirect()->back()->withErrors(["image_url" => "La URL de imágen no es válida."])->withInput();
				}
			}
		}
		return $image;
	}


	/**
	 * Agregar un item del carousel y volver a la página de portadas.
	 * @param Request $request [description]
	 */
	public function addCarouselItem(Request $request) 
	{
		$request->validate([
			"title" => "max:45",
			"description" => "max: 95",
			"image_type" => "required|in:upload,url",
			"image_file" => "required_if:image_type,upload|file|max:5120",
			"image_url" => "required_if:image_type,url",
			"action_btn_text" => "required_with:show_action_btn",
			"action_btn_url" => "required_with:show_action_btn"
		]);


		if($request->image_type == "upload") {
			$image = Image::make($request->file("image_file"));
		}
		else if($request->image_type == "url") {
			
			$image = Images::loadFromUrl($request->image_url);
			if(!$image) {
				return redirect()->back()->withErrors(["image_url" => "La URL de imágen no es válida."])->withInput();
			}

		}

		$carouselItem = CarouselItem::create([
			"title" => $request->title,
			"description" => $request->description,
			"img_path" => "",
			"action_button" => $request->has("show_action_btn"),
			"action_url" => $request->action_btn_url,
			"action_text" => $request->action_btn_text
		]);
		
		$carouselItem->assignUploadedImage($image);


		return redirect()->route("admin.covers.overview");
	}



	/**
	 * Mostrar formulario para ver detalles/editar item de carousel.
	 * @param  int $id
	 * @return [type]
	 */
	public function showCarouselItemEditForm($id)
	{
		$carouselItem = CarouselItem::findOrFail($id);

		return view("admin.cover-imgs.carousel-items.create-update")->with("carouselItem", $carouselItem);
	}


	/**
	 * Envío formulario para modificar item del slider de pag ppal.
	 * @param  Request $request [description]
	 * @param  [type]  $id      [description]
	 * @return [type]           [description]
	 */
	public function editCarouselItem(Request $request, $id)
	{
		
		$request->validate([
			"title" => "max:45",
			"description" => "max: 95",
			"change_image" => "required|in:true,false",
			"image_type" => "required_if:change_image,true|in:upload,url",
			"image_file" => "required_if:image_type,upload|file|max:5120",
			"image_url" => "required_if:image_type,url",
			"action_btn_text" => "required_with:show_action_btn",
			"action_btn_url" => "required_with:show_action_btn"
		]);

		$carouselItem = CarouselItem::findOrFail($id);


		if($request->change_image == "true") {

			if($request->image_type == "upload") {
				$image = Image::make($request->file("image_file"));
			}
			else if($request->image_type == "url") {
				
				$image = Images::loadFromUrl($request->image_url);
				if(!$image) {
					return redirect()->back()->withErrors(["image_url" => "La URL de imágen no es válida."])->withInput();
				}
			}
		}


		$carouselItem->fill([
			"title" => $request->title,
			"description" => $request->description,
			"action_button" => $request->has("show_action_btn"),
			"action_url" => $request->action_btn_url,
			"action_text" => $request->action_btn_text		
		]);

		$carouselItem->save();

		if($request->change_image == "true")
			$carouselItem->assignUploadedImage($image);


		return redirect()->route("admin.covers.overview");
	}



	/**
	 * Eliminar un elemento del carrousel.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function deleteCarouselItem($id)
	{
		$carouselItem = CarouselItem::findOrFail($id);

		$carouselItem->deleteImage();
		$carouselItem->delete();

		return redirect()->route("admin.covers.overview");
	}


}
