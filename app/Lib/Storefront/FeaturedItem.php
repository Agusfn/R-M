<?php
namespace App\Lib\Storefront;


use Illuminate\Support\Facades\Storage;


class FeaturedItem
{
	
	/**
	 * Directorio del storage en donde se guardan las imgs de los ítems destacados
	 */
	const IMG_STORAGE_DIR = "imgs/storefront/featured";


	/**
	 * [$title description]
	 * @var string
	 */
	public $title;
	
	/**
	 * [$img_path description]
	 * @var string
	 */
	public $imgPath;

	/**
	 * [$actionBtn description]
	 * @var boolean
	 */
	public $showActionBtn;

	/**
	 * [$buttonText description]
	 * @var string
	 */
	public $buttonText;


	/**
	 * [$buttonUrl description]
	 * @var string
	 */
	public $buttonUrl;


	/**
	 * Asignar datos desde array de Setting.
	 * @param [type] $data [description]
	 */
	public function setDataFromArray($data)
	{
		$this->title = $data["title"];
		$this->imgPath = $data["img_path"];
		$this->showActionBtn = $data["action_btn"];
		$this->buttonText = $data["btn_text"];
		$this->buttonUrl = $data["button_url"];
	}


	/**
	 * Obtener array de datos del item destacado para almacenarlo en Settings.
	 * @return [type] [description]
	 */
	public function getDataArray()
	{
		return [
			"title" => $this->title,
			"img_path" => $this->imgPath,
			"action_btn" => $this->showActionBtn,
			"btn_text" => $this->buttonText,
			"button_url" => $this->buttonUrl
		];
	}

	/**
	 * [setData description]
	 * @param string $title     
	 * @param Intervention\Image\Image $image     
	 * @param boolean $showActionBtn 
	 * @param string $btnText
	 * @param string $btnUrl   
	 */
	public function load($title, $image, $showActionBtn, $btnText, $btnUrl)
	{
		$this->title = $title;
		$this->showActionBtn = $showActionBtn;
		$this->buttonText = $btnText;
		$this->buttonUrl = $btnUrl;

		if($image != null) {
			$this->deleteImageIfExists();
			$this->imgPath = $this->saveImgIntoStorage($image);
		}
	}


	/**
	 * Obtener URL de imágen.
	 * @return [type] [description]
	 */
	public function imgUrl()
	{
		return Storage::url($this->imgPath);
	}



	/**
	 * Eliminar imágen de este ítem del storage (si existe)
	 * @return [type] [description]
	 */
	public function deleteImageIfExists()
	{
		if($this->imgPath && Storage::exists($this->imgPath)) {
			Storage::delete($this->imgPath);
		}
	}


	/**
	 * [saveImgIntoStorage description]
	 * @param  Intervention\Image\Image $image
	 * @return string        image path
	 */
	private function saveImgIntoStorage($image)
	{
		$imgPath = self::IMG_STORAGE_DIR."/".uniqid(true).".jpg";
		$image->encode("jpg");
		$image->fit(370, 300); // size of right
		Storage::put($imgPath, $image->stream());

		return $imgPath;
	}





}