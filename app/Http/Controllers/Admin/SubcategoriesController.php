<?php

namespace App\Http\Controllers\Admin;

use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class SubcategoriesController extends AdminBaseController
{
    

	/**
	 * Create a new subcategory.
	 * @return [type] [description]
	 */
	public function create(Request $request)
	{
		$validator = Validator::make($request->all(), [
			"category_id" => "required|int|exists:categories,id",
			"subcategory_name" => "required",
			"subcategory_name_slug" => [
				"required",
				"min:2",
				"url_slug",
				Rule::unique('subcategories', "name_slug")->where(function ($query) use ($request) {
    				return $query->where('category_id', $request->category_id);
				})
			]
		]);

        if($validator->fails()) {
			return redirect()->back()->withErrors($validator, "create_subcategory")->withInput();
        }


        Subcategory::create([
        	"order" => Subcategory::getNextOrder($request->category_id),
        	"category_id" => $request->category_id,
        	"name" => $request->subcategory_name,
        	"name_slug" => $request->subcategory_name_slug
        ]);

        return redirect()->back();
	}



	/**
	 * Display the details of a certain subcategory.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function details($id)
	{
		$subcategory = Subcategory::findOrFail($id);

		return view("admin.categories.subcategory")->with([
			"subcategory" => $subcategory,
		]);
	}




	/**
	 * Reorder the subcategories, parting from a json array of the subcategory ids in the wanted order.
	 * @return [type] [description]
	 */
	public function reorder(Request $request)
	{
		
		$request->validate([
			"ordered_subcategories_json" => "required|json"
		]);

		$orderedSubcategoryIds = json_decode($request->ordered_subcategories_json);

		// check integrity of array first
		foreach($orderedSubcategoryIds as $order => $subcategoryId) {
			if(!is_int($order) || !is_numeric($subcategoryId))
				return redirect()->back();
		}

		foreach($orderedSubcategoryIds as $order => $subcategoryId) {
			
			$subcategory = Subcategory::find($subcategoryId);
			
			if($subcategory) {
				$subcategory->order = $order+1;
				$subcategory->save();
			}
		}

		return redirect()->back();
	}



	/**
	 * Update a certain category.
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function update(Request $request, $id)
	{
		$subcategory = Subcategory::findOrFail($id);

		$request->validate([
			"name" => "required",
			"name_slug" => [
				"required",
				"min:2",
				"url_slug",
				Rule::unique('subcategories')->where(function ($query) use ($subcategory, $id) {
    				return $query->where('category_id', $subcategory->category_id)->where("id", "!=", $id);
				})
			]
		]);



        $subcategory->fill($request->only(["name", "name_slug"]));
        $subcategory->save();

        return redirect()->back();
	}



	/**
	 * Delete a subcategory.
	 * @param  [type] $subcategoryId [description]
	 * @return [type]             [description]
	 */
	public function delete($subcategoryId)
	{
		$subcategory = Subcategory::findOrFail($subcategoryId);
		$categoryId = $subcategory->category_id;

		if($subcategory->products()->count() > 0) {
			return redirect()->back()->withErrors("Esta subcategoría tiene productos existentes, cambia las categorías o elimina los productos primero.", "delete");
		}

		$subcategory->delete();

		return redirect()->route("admin.categories.details", $categoryId);
	}


}
