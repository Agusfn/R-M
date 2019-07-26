<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class CategoriesController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware("auth");
    }

    	
    /**
     * Display a list of all the categories.
     * @return [type] [description]
     */
	public function list()
	{
		$categories = Category::ordered()->get();
		return view("admin.categories.list")->with("categories", $categories);
	}


	/**
	 * Create a new category.
	 * @return [type] [description]
	 */
	public function create(Request $request)
	{

		$validator = Validator::make($request->all(), [
			"name" => "required",
			"name_slug" => "required|min:2|url_slug|unique:categories"
		]);

        if($validator->fails()) {
			return redirect()->back()->withErrors($validator, "create_category")->withInput();
        }

        Category::create([
        	"order" => Category::getNextOrder(),
        	"name" => $request->name,
        	"name_slug" => $request->name_slug
        ]);

        return redirect()->back();
	}



	/**
	 * Display the details of a certain category.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function details($id)
	{
		$category = Category::findOrFail($id);
		$subcategories = $category->subcategories()->ordered()->get();

		return view("admin.categories.details")->with([
			"category" => $category,
			"subcategories" => $subcategories
		]);
	}



	/**
	 * Update a certain category.
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function update(Request $request, $id)
	{
		$category = Category::findOrFail($id);

		$validator = Validator::make($request->all(), [
			"name" => "required",
			"name_slug" => "required|min:2|url_slug|unique:categories,name_slug,".$id
		]);

        if($validator->fails()) {
			return redirect()->back()->withErrors($validator, "update_category")->withInput();
        }

        $category->fill($request->only(["name", "name_slug"]));
        $category->save();

        return redirect()->back();
	}



	/**
	 * Reorder the categories, parting from a json array of the category ids in the wanted order.
	 * @return [type] [description]
	 */
	public function reorderCategories(Request $request)
	{
		$request->validate([
			"ordered_categories_json" => "required|json"
		]);

		$orderedCategoryIds = json_decode($request->ordered_categories_json);
		
		// check integrity of array first
		foreach($orderedCategoryIds as $order => $categoryId) {
			if(!is_int($order) || !is_numeric($categoryId))
				return redirect()->back();
		}

		foreach($orderedCategoryIds as $order => $categoryId) {
			
			$category = Category::find($categoryId);
			
			if($category) {
				$category->order = $order+1;
				$category->save();
			}
		}

		return redirect()->back();
	}


	/**
	 * Delete a category.
	 * @param  [type] $categoryId [description]
	 * @return [type]             [description]
	 */
	public function delete($categoryId)
	{
		$category = Category::findOrFail($categoryId);

		if($category->subcategories()->count() > 0) {
			return redirect()->back()->withErrors("La categoría posee subcategorías, no es posible eliminar sin que se eliminen las subcategorías primero.", "delete");
		}

		// add validation if products exist

		$category->delete();

		return redirect()->route("admin.categories.list");
	}


}
