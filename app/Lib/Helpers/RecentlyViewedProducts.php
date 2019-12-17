<?php
namespace App\Lib;

class RecentlyViewedProducts
{

	const MAX_PRODUCTS = 10;


	/**
	 * Add a new product id to recently viewed 
	 * @param [type] $productId [description]
	 */
	public static function addProductId($productId)
	{
		if(!is_int($productId))
			return;

		$productIds = session()->get("products.recently_viewed");

		if($productIds == null) {
			$productIds = [$productId];
		} 
		else {
			if(!in_array($productId, $productIds)) {
				array_push($productIds, $productId);
			}

			if(sizeof($productIds) >= self::MAX_PRODUCTS) {
				array_shift($productIds);
			}
		}

		session()->put("products.recently_viewed", $productIds);
	}


	/**
	 * Get recently viewed product ids.
	 * @return [type] [description]
	 */
	public static function getIds()
	{
		return session()->get("products.recently_viewed");
	}



}