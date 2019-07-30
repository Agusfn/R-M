<?php

namespace App;

use App\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
	protected $guarded = [];



	/**
	 * Generate a random unique product code with 6 digits.
	 * @return int
	 */
	public static function generateCode()
	{
		$code = rand(100000, 999999);
		if(self::where("code", $code)->count() > 0)
			return self::generateCode();
		else
			return $code;
	}


	/**
	 * Find a product with its code.
	 * @return App\Product|null
	 */
	public static function findWithCode($code)
	{
		return self::where("code", $code)->first();
	}



	public function images()
	{
		return $this->hasMany("App\ProductImage");
	}


	public function category()
	{
		return $this->belongsTo("App\Category");
	}



	public function subcategory()
	{
		return $this->belongsTo("App\Subcategory");
	}


	/**
	 * Sets the main image to the first one in the order. 
	 * If it has no images, it sets to null.
	 * @return null
	 */
	public function setMainImage()
	{
		if($newImg = $this->images()->ordered()->first())
			$this->main_img_path = $newImg->square_path;
		else
			$this->main_img_path = null;

		$this->save();
	}


	/**
	 * Delete each image 
	 * @return [type] [description]
	 */
	public function deleteAllImages()
	{
		foreach($this->images as $image) {
			$image->delete();
		}
		Storage::deleteDirectory(ProductImage::IMG_DIR."/".$this->id);
	}


	/**
	 * [mainImgUrl description]
	 * @return [type] [description]
	 */
	public function imgUrl()
	{

	}


	/**
	 * [thumbnailUrl description]
	 * @return [type] [description]
	 */
	public function thumbnailUrl()
	{
		return Storage::url($this->main_img_path);
	}
	
    
}
