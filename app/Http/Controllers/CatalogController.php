<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Lib\RecentlyViewedProducts;
use Illuminate\Support\Facades\View;


class CatalogController extends StorefrontBaseController
{
    	


	/**
	 * Using the search form, redirect to category route if filtered by category.
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function search(Request $request)
	{
		if($request->filled("categoria")) {
			return redirect()->route("category", [$request->categoria, "q" => $request->q]);
		}
		else {
			$products = Product::query();
			return $this->filterPaginateAndDisplay($request, $products);
		}

	}


	/**
	 * Display category filtered product catalog.
	 * @param  Request $request       [description]
	 * @param  [type]  $category_slug [description]
	 * @return [type]                 [description]
	 */
	public function category(Request $request, $category_slug)
	{
		$category = Category::with("subcategories")->whereSlug($category_slug)->first();

		if(!$category)
			return redirect()->route("home");


		View::share("categoryFiltered", $category);

		$products = Product::whereCategoryId($category->id);

		return $this->filterPaginateAndDisplay($request, $products);
	}



	/**
	 * Display subcategory filtered product catalog.
	 * @param  Request $request          [description]
	 * @param  [type]  $category_slug    [description]
	 * @param  [type]  $subcategory_slug [description]
	 * @return [type]                    [description]
	 */
	public function subcategory(Request $request, $category_slug, $subcategory_slug)
	{
		$category = Category::whereSlug($category_slug)->first();
		
		if(!$category)
			return redirect()->route("home");

		$subcategory = Subcategory::fromCategoryId($category->id)->whereSlug($subcategory_slug)->first();

		if(!$subcategory)
			return redirect()->route("home");


		View::share("categoryFiltered", $category);
		View::share("subcategoryFiltered", $subcategory);

		$products = Product::whereCategoryId($category->id)->whereSubcategoryId($subcategory->id);

		return $this->filterPaginateAndDisplay($request, $products);
	}



	/**
	 * Mostrar página de resultados de productos paginados y filtrados.
	 * @param  Request $request  [description]
	 * @param  [type]  $products [description]
	 * @return [type]            [description]
	 */
	private function filterPaginateAndDisplay(Request $request, $products)
	{
		if($request->filled("q")) {
			$products = $products->where("name", "like", "%".$request->q."%");
		}

		$products = $products->paginate(9);

		if($request->layout == "list")
			return view("catalog.product-list")->with([
				"products" => $products,
				"layout" => "list"
			]);
		else
			return view("catalog.product-grid-3-col")->with([
				"products" => $products,
				"layout" => "grid"
			]);

	}



	/**
	 * Display product (that belongs to a category but not a subcategory)
	 * @param  [type] $category_slug     [description]
	 * @param  [type] $product_id      [description]
	 * @param  [type] $product_name_slug [description]
	 * @return [type]                    [description]
	 */
	public function productWithoutSubcat($category_slug, $product_id, $product_name_slug)
	{
		$category = Category::whereSlug($category_slug)->first();

		if(!$category)
			return redirect()->route("home");

		return $this->findProductAndGetResponse($category->id, null, $product_id, $product_name_slug);
	}



	/**
	 * Display product (that belongs to a category and a subcategory)
	 * @param  [type] $category_slug     [description]
	 * @param  [type] $product_id      [description]
	 * @param  [type] $product_name_slug [description]
	 * @return [type]                    [description]
	 */
	public function product($category_slug, $subcategory_slug, $product_id, $product_name_slug)
	{
		$category = Category::whereSlug($category_slug)->first();

		if(!$category)
			return redirect()->route("home");

		$subcategory = Subcategory::fromCategoryId($category->id)->whereSlug($subcategory_slug)->first();

		if(!$subcategory)
			return redirect()->route("home");

		return $this->findProductAndGetResponse($category->id, $subcategory->id, $product_id, $product_name_slug);
	}



	/**
	 * Find a product with the category id, subcategory id, and code given. If it exists, return a response with the product page view.
	 * @param  [type] $categoryId    [description]
	 * @param  [type] $subCategoryId [description]
	 * @param  [type] $productId   [description]
	 * @param  [type] $productSlug   [description]
	 * @return [type]                [description]
	 */
	private function findProductAndGetResponse($categoryId, $subCategoryId, $productId, $productSlug)
	{
		
		$product = Product::with(["category","subcategory"])
			->whereCategoryId($categoryId)
			->whereSubcategoryId($subCategoryId)
			->where("id", $productId)
			->first();

		if(!$product)
			return redirect()->route("home");

		// Increment product view count
		views($product)->delayInSession(10)->record();

		// Add recently viewed product id to session
		RecentlyViewedProducts::addProductId($product->id);

		// Redirect to proper product route if slug is different
		if($product->name_slug != $productSlug) {
			return redirect()->to($product->url());
		}

		return view("product")->with("product", $product);
	}




}
