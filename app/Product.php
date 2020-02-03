<?php

namespace App;

use App\ProductImage;
use App\Filters\Filterable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Support\Period;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;


class Product extends Model implements ViewableContract
{
    use Viewable, Filterable;

    
    protected $removeViewsOnDelete = true;

	protected $guarded = [];



	public function scopeWhereCategoryId($query, $categoryId)
	{
		return $query->where("category_id", $categoryId);
	}

	public function scopeWhereSubcategoryId($query, $subcategoryId)
	{
		return $query->where("subcategory_id", $subcategoryId);
	}


	public function scopeWithCategory($query)
	{
		return $query->with(["category","subcategory"]);
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
		if($newImg = $this->images()->ordered()->first()) {
			$this->main_img_path = $newImg->path;
			$this->main_img_square_path = $newImg->square_path;
			$this->main_img_thumbnail_path = $newImg->thumbnail_path;
		}
		else {
			$this->main_img_path = null;
			$this->main_img_square_path = null;
			$this->main_img_thumbnail_path = null;
		}

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
	 * Obtener imagen principal del producto.
	 * @return string|null [description]
	 */
	public function imgUrl()
	{
		if($this->main_img_path)
			return Storage::url($this->main_img_path);
		else
			return null;
	}


	/**
	 * Obtener url de miniatura (es cuadrada, pero mas chica que main_img_square_path)
	 * @return [type] [description]
	 */
	public function thumbnailUrl()
	{
		if($this->main_img_thumbnail_path)
			return Storage::url($this->main_img_thumbnail_path);
		else
			return null;
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
				$this->id, 
				$this->name_slug
			]);
		}
		else {
			return route('product', [
				$this->category->name_slug, 
				$this->subcategory->name_slug,
				$this->id, 
				$this->name_slug
			]);
		}
	}


	/**
	 * Obtener colección de productos similares.
	 * @return [type] [description]
	 */
	public function getSimilarProducts()
	{
		if($this->subcategory_id != null) {
			$products = self::whereCategoryId($this->category_id)
				->whereSubcategoryId($this->subcategory_id)
				->where("id", "!=", $this->id)
				->limit(10)->get();
		}
		else {
			$products = self::scopeWhereCategoryId($this->category_id)
				->where("id", "!=", $this->id)
				->limit(10)->get();
		}

		return $products;
	}
    
}
