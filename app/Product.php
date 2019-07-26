<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
	protected $guarded = [];



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
