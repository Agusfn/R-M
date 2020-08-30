<?php
namespace App\Lib\Storefront;

use \Setting;

class FeaturedItems
{

	const NAVBAR_FEATURED = "navbar_featued";
	const SLIDER_FIRST_FEATURED = "slider_first_featured";
	const SLIDER_SECOND_FEATURED = "slider_second_featured";
	

	/**
	 * El item destacado que se mostrará en la sección "productos" de la navbar.
	 * @var FeaturedItem
	 */
	public $navbarFeatured;
	
	/**
	 * El item destacado que se mostrará a la derecha del slider de la pag home, en la parte de arriba.
	 * @var FeaturedItem
	 */
	public $sliderFirstFeatured;

	/**
	 * El item destacado que se mostrará a la derecha del slider de la pag home, en la parte de abajo.
	 * @var FeaturedItem
	 */
	public $sliderSecondFeatured;



	public function __construct() 
	{
		$featuredItemsData = Setting::get("storefront.featured_items");
		
		if(!empty($featuredItemsData[self::NAVBAR_FEATURED])) {
			$this->navbarFeatured = new FeaturedItem();
			$this->navbarFeatured->setDataFromArray($featuredItemsData[self::NAVBAR_FEATURED]);
		}

		if(!empty($featuredItemsData[self::SLIDER_FIRST_FEATURED])) {
			$this->sliderFirstFeatured = new FeaturedItem();
			$this->sliderFirstFeatured->setDataFromArray($featuredItemsData[self::SLIDER_FIRST_FEATURED]);
		}

		if(!empty($featuredItemsData[self::SLIDER_SECOND_FEATURED])) {
			$this->sliderSecondFeatured = new FeaturedItem();
			$this->sliderSecondFeatured->setDataFromArray($featuredItemsData[self::SLIDER_SECOND_FEATURED]);
		}
	}


	/**
	 * Eliminar item destacado de navbar.
	 */
	public function removeNavbarFeatured()
	{
		if($this->navbarFeatured) {
			$this->navbarFeatured->deleteImageIfExists();
			$this->navbarFeatured = null;		
		}
		Setting::set("storefront.featured_items.".self::NAVBAR_FEATURED, null);
		Setting::save();
	}


	/**
	 * Establecer ítem destacado de navbar
	 * @param string $title     
	 * @param Intervention\Image\Image $image     
	 * @param boolean $actionBtn 
	 * @param string $btnText
	 * @param string $btnUrl    
	 */
	public function setNavbarFeatured($title, $image, $actionBtn, $btnText, $btnUrl)
	{
		if($this->navbarFeatured == null) {
			$this->navbarFeatured = new FeaturedItem();
		}
		$this->navbarFeatured->load($title, $image, $actionBtn, $btnText, $btnUrl);
		Setting::set("storefront.featured_items.".self::NAVBAR_FEATURED, $this->navbarFeatured->getDataArray());
		Setting::save();
	}


	/**
	 * Establecer ítem destacado
	 * @param string $title     
	 * @param Intervention\Image\Image $image     
	 * @param boolean $actionBtn 
	 * @param string $btnText
	 * @param string $btnUrl    
	 */
	public function setSliderFirstFeatured($title, $image, $actionBtn, $btnText, $btnUrl)
	{
		if($this->sliderFirstFeatured == null) {
			$this->sliderFirstFeatured = new FeaturedItem();
		}
		$this->sliderFirstFeatured->load($title, $image, $actionBtn, $btnText, $btnUrl);
		Setting::set("storefront.featured_items.".self::SLIDER_FIRST_FEATURED, $this->sliderFirstFeatured->getDataArray());
		Setting::save();
	}


	public function removeSliderFirstFeatured()
	{
		if($this->sliderFirstFeatured) {
			$this->sliderFirstFeatured->deleteImageIfExists();
			$this->sliderFirstFeatured = null;		
		}
		Setting::set("storefront.featured_items.".self::SLIDER_FIRST_FEATURED, null);
		Setting::save();
	}



	/**
	 * Establecer ítem destacado
	 * @param string $title     
	 * @param Intervention\Image\Image $image     
	 * @param boolean $actionBtn 
	 * @param string $btnText
	 * @param string $btnUrl    
	 */
	public function setSliderSecondFeatured($title, $image, $actionBtn, $btnText, $btnUrl)
	{
		if($this->sliderSecondFeatured == null) {
			$this->sliderSecondFeatured = new FeaturedItem();
		}
		$this->sliderSecondFeatured->load($title, $image, $actionBtn, $btnText, $btnUrl);
		Setting::set("storefront.featured_items.".self::SLIDER_SECOND_FEATURED, $this->sliderSecondFeatured->getDataArray());
		Setting::save();
	}


	public function removeSliderSecondFeatured()
	{
		if($this->sliderSecondFeatured) {
			$this->sliderSecondFeatured->deleteImageIfExists();
			$this->sliderSecondFeatured = null;		
		}
		Setting::set("storefront.featured_items.".self::SLIDER_SECOND_FEATURED, null);
		Setting::save();
	}

}