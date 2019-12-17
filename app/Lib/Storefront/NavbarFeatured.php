<?php
namespace App\Lib\Storefront;

use \Setting;
use App\Product;
use Illuminate\Support\Facades\Storage;


class NavbarFeatured
{

	/**
	 * Directorio donde se almacenan las imágenes custom.
	 */
	const IMG_STORAGE_DIR = "imgs/storefront/nav_featured";


	const DISPLAY_NONE = 0;
	const DISPLAY_PRODUCT = 1;
	const DISPLAY_CUSTOM_IMG = 2;


	private $displayMode;


	public $product;

	private $title;
	private $imageUrl;
	private $actionUrl;


	public function __construct() 
	{
		$this->displayMode = Setting::get("storefront.navbar_featured.display_mode");

		if($this->displayMode == self::DISPLAY_PRODUCT) {
			$this->product = Product::find(Setting::get("storefront.navbar_featured.product_id"));

			$this->title = $this->product->name;
			$this->imageUrl = $this->product->thumbnailUrl();
			$this->actionUrl = $this->product->url();
		}
		else if($this->displayMode == self::DISPLAY_CUSTOM_IMG) {
			$this->title = Setting::get("storefront.navbar_featured.custom_img.title");
			$this->actionUrl = Setting::get("storefront.navbar_featured.custom_img.action_url");
			$this->imageUrl = Storage::url(Setting::get("storefront.navbar_featured.custom_img.img_storage_path"));
		}
	}


	public function showingNothing()
	{
		if($this->displayMode == null || $this->displayMode == self::DISPLAY_NONE)
			return true;
		else
			return false;
	}


	public function showingProduct()
	{
		if($this->displayMode == self::DISPLAY_PRODUCT)
			return true;
		else
			return false;
	}


	public function showingCustomImg()
	{
		if($this->displayMode == self::DISPLAY_CUSTOM_IMG)
			return true;
		else
			return false;
	}


	public function getTitle() {
		return $this->title;
	}

	public function getImgUrl() {
		return $this->imageUrl;
	}

	public function getActionUrl() {
		return $this->actionUrl;
	}


	public function setDisplayNothing() {

		if($this->showingCustomImg())
			$this->deleteCurrentCustomImg();

		$this->displayMode = self::DISPLAY_NONE;
		Setting::set("storefront.navbar_featured.product_id", null);
		Setting::set("storefront.navbar_featured.display_mode", $this->displayMode);
		Setting::save();
	}


	public function setDisplayProduct($productId) {

		if($this->showingCustomImg())
			$this->deleteCurrentCustomImg();

		$this->displayMode = self::DISPLAY_PRODUCT;
		$this->product = Product::find($productId);

		$this->title = $this->product->name;
		$this->imageUrl = $this->product->thumbnailUrl();
		$this->actionUrl = $this->product->url();

		Setting::set("storefront.navbar_featured.display_mode", $this->displayMode);
		Setting::set("storefront.navbar_featured.product_id", $productId);

		Setting::save();
	}


	/**
	 * [setCustomImage description]
	 * @param string $title 
	 * @param string $url   
	 * @param Intervention\Image\Image $image
	 */
	public function setCustomImage($title, $url, $image) {

		$this->displayMode = self::DISPLAY_CUSTOM_IMG;
		Setting::set("storefront.navbar_featured.product_id", null);
		Setting::set("storefront.navbar_featured.display_mode", $this->displayMode);

		$this->title = $title;
		$this->actionUrl = $url;
		
		Setting::set("storefront.navbar_featured.custom_img.title", $this->title);
		Setting::set("storefront.navbar_featured.custom_img.action_url", $this->actionUrl);

		if($image) {
			if($this->showingCustomImg())
				$this->deleteCurrentCustomImg();
			
			$imgPath = $this->saveImg($image);
			$this->imageUrl = Storage::url($imgPath);
			Setting::set("storefront.navbar_featured.custom_img.img_storage_path", $imgPath);
		}

		Setting::save();
	}



	/**
	 * Save an image and get its path.
	 * @param  Intervention\Image\Image $image [description]
	 * @return [type]        [description]
	 */
	private function saveImg($image)
	{
		$imgPath = self::IMG_STORAGE_DIR."/".uniqid(true).".jpg";

		$image->encode("jpg");
		Storage::put($imgPath, $image->stream());

		return $imgPath;
	}



	/**
	 * Eliminar del disco imagen custom actual.
	 * @return [type] [description]
	 */
	private function deleteCurrentCustomImg() {

		$imgStoragePath = Setting::get("storefront.navbar_featured.custom_img.img_storage_path");

		if($imgStoragePath && Storage::exists($imgStoragePath)) {
			Storage::delete($imgStoragePath);
		}

	}


}