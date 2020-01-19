<?php
namespace App\Lib\Storefront;

use App\Category;
use App\Product;
use CyrildeWit\EloquentViewable\Support\Period;


class ProductFetch
{



	/**
	 * Obtener una determinada cantidad de los productos más vistos.
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public static function getTopViewed($topLimit)
	{
        
        $featuredProducts = Product::withCategory()
	        ->orderByViews('desc', Period::pastDays(14))
	        ->limit($topLimit)
	        ->get();

        // Agregamos productos faltantes en caso que no se llegue al limite, para llegar.
	    $countDiff = $topLimit - $featuredProducts->count();

        if($countDiff > 0) {

        	$takenIds = $featuredProducts->pluck("id")->toArray();

        	$fillProducts = Product::whereNotIn("id", $takenIds)
	        	->orderBy("id", "DESC")
	        	->limit($countDiff)
	        	->get();
        }

        return $featuredProducts->merge($fillProducts);
	}



	/**
	 * Obtener productos mas vistos de la categoria 1 a la 5.
	 * @param  array 	$categoryIds
	 * @param  int 		$topLimit
	 * @return Collection
	 */
	public static function getTopViewedFromCategories($categoryIds, $topLimit)
	{
     	
     	$categories = Category::all();

     	$topCategoryProducts = [];

		foreach($categories as $category)
		{
			if(!in_array($category->id, $categoryIds))
				continue;

	        $featuredProducts = Product::withCategory()
		        ->where("category_id", $category->id)
		        ->orderByViews('desc', Period::pastDays(14))
		        ->limit($topLimit)
		        ->get();

	        // Agregamos productos faltantes en caso que no se llegue al limite, para llegar.
	        $countDiff = $topLimit - $featuredProducts->count();

       		if($countDiff > 0) {

	        	$takenIds = $featuredProducts->pluck("id")->toArray();

	        	$fillProducts = Product::where("category_id", $category->id)
		        	->whereNotIn("id", $takenIds)
		        	->orderBy("id", "DESC")
		        	->limit($countDiff)
		        	->get();
	        }

	        $topCategoryProducts[] = [
	        	"category_slug" => $category->name_slug,
	        	"category_name" => $category->name,
	        	"products" => $featuredProducts->merge($fillProducts)
	        ];

		}

        return $topCategoryProducts;
	}




	/**
	 * Obtener productos mas recientemente agregados.
	 * @return [type]
	 */
	public static function getMostRecent($limit)
	{
		return Product::withCategory()->orderBy("updated_at", "DESC")->limit($limit)->get();
	}


}