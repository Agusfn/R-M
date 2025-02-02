<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use App\Subcategory;
use App\ProductImage;
use App\Lib\Helpers\Strings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Filters\ProductFilters;
use App\Http\Requests\CreateProduct;
use Illuminate\Support\Facades\Validator;

class ProductsController extends AdminBaseController
{
    

    
    /**
     * List all products.
     * @return [type] [description]
     */
	public function list(ProductFilters $filters)
	{
		$categories = Category::ordered()->get();

		$products = Product::with(["category", "subcategory"])
		->filter($filters)
		->paginate(15);

		return view("admin.products.list")->with([
			"products" => $products,
			"categories" => $categories
		]);
	}


	
	/**
	 * Show create product form.
	 * @return [type] [description]
	 */
	public function showCreateForm()
	{
		return view("admin.products.create-update")->with("categories", Category::getAll());
	}



	/**
	 * Show product details.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function details($id)
	{
		$product = Product::findOrFail($id);

		return view("admin.products.create-update")->with([
			"product" => $product,
			"categories" => Category::getAll()
		]);
	}


	/**
	 * Upload a product image. At first they are not associated with any product, they get associated upon sending the form.
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function uploadImage(Request $request) 
	{
		$validator = Validator::make($request->all(), [
			"file" => "required|file|mimes:jpeg,png|max:4096"
		]);

		if ($validator->fails()) {
			return response($validator->messages()->first(), 422);
        }
        
        $productImage = ProductImage::createFromFile($request->file("file"));

		return response()->json([
			"img_id" => $productImage->id
		]);
	}


	/**
	 * Create a new product.
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function create(CreateProduct $request)
	{
		
		$request->validated();

		// check if subcategory belongs to category. If not, do not assign subcategory.
		if($request->subcategory_id) {
			$subcategory = Subcategory::find($request->subcategory_id);

			if($subcategory->category_id != $request->category_id)
				$request->subcategory_id = null;
		}


		$product = Product::create([
			"code" => $request->code,
			"category_id" => $request->category_id,
			"subcategory_id" => $request->subcategory_id,
			"name" => $request->name,
			"name_slug" => Strings::slugify($request->name),
			"description" => $request->description
		]);

		$orderedImgIds = json_decode($request->ordered_img_ids);

		ProductImage::associateImgsToProductAndReorder($orderedImgIds, $product->id);

		$product->setMainImage();

		return redirect()->route("admin.products.list");
	}


	/**
	 * Delete a certain product image, whether it belongs to a product or not.
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function deleteImage(Request $request)
	{
		$request->validate(["img_id" => "required|integer|exists:product_images,id"]);

		$image = ProductImage::find($request->img_id);
		$productId = $image->product_id;

		$image->delete();

		if($productId && $product = Product::find($productId)) {
			$product->setMainImage();
		}

	}


	/**
	 * Update a product information.
	 * @return [type] [description]
	 */
	public function update(Request $request, $productId)
	{
		$product = Product::findOrFail($productId);

		$request->validate([
			"code" => "nullable|unique:products,code,".$product->id,
            "ordered_img_ids" => "required|json",
            "name" => "required",
            "category_id" => "required|integer|exists:categories,id",
            "subcategory_id" => "nullable|integer|exists:subcategories,id"
		]);


		// check if subcategory belongs to category. If not, do not assign subcategory.
		if($request->subcategory_id) {
			$subcategory = Subcategory::find($request->subcategory_id);

			if($subcategory->category_id != $request->category_id)
				$request->subcategory_id = null;
		}

		$product->fill($request->only([
			"code",
			"category_id",
			"subcategory_id",
			"name",
			"description"
		]));
		$product->name_slug = Strings::slugify($product->name);
		$product->save();


		$orderedImgIds = json_decode($request->ordered_img_ids);

		ProductImage::associateImgsToProductAndReorder($orderedImgIds, $product->id);

		$product->setMainImage();


		return redirect()->back();
	}


	/**
	 * Delete a product with all its images from disk and db.
	 * @param  [type] $productId [description]
	 * @return [type]            [description]
	 */
	public function delete($productId)
	{
		$product = Product::findOrFail($productId);

		$product->deleteAllImages();
		$product->delete();

		return redirect()->route("admin.products.list");
	}



}
