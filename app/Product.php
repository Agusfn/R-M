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


	public function scopeWhereCategoryId($query, $categoryId)
	{
		return $query->where("category_id", $categoryId);
	}

	public function scopeWhereSubcategoryId($query, $subcategoryId)
	{
		return $query->where("subcategory_id", $subcategoryId);
	}



	/**
	 * Find a product with its code.
	 * @return App\Product|null
	 */
	public function scopeWhereCode($query, $code)
	{
		return $query->where("code", $code);
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
	

	/**
	 * The URL of the product in the store.
	 * @return [type] [description]
	 */
	public function url()
	{
		if($this->subcategory_id == null) {
			return route('product-no-subcategory', [
				$this->category->name_slug, 
				$this->code, 
				$this->name_slug
			]);
		}
		else {
			return route('product', [
				$this->category->name_slug, 
				$this->subcategory->name_slug,
				$this->code, 
				$this->name_slug
			]);
		}
	}

    
}
