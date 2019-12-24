<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ProductFilters extends QueryFilters
{
	
    protected $request;

    public function __construct(Request $request)
    {

    	if(!$request->has("order"))
    		$request->merge(["order" => "recently_created"]);


        $this->request = $request;
        parent::__construct($request);
    }


    /**
     * Ordenamiento por parámetro "order"
     * @param  [type] $term [description]
     * @return [type]       [description]
     */
    public function order($term) 
    {
    	
        if($term == "recently_created") {
            return $this->builder->orderBy("created_at", "DESC");
        }
        if($term == "name_asc") {
            return $this->builder->orderBy("name", "ASC");
        }
    	else if($term == "name_desc") {
    		return $this->builder->orderBy("name", "DESC");
    	}
        else if($term == "code_asc") {
            return $this->builder->orderBy("code", "ASC");
        }
        else if($term == "category_name") {
            return $this->builder
                ->join("categories", "products.category_id", "=", "categories.id")
                ->join("subcategories", "products.subcategory_id", "=", "subcategories.id")
                ->orderBy("categories.name", "ASC")
                ->orderBy("subcategories.name", "ASC")
                ->select("products.*");
        }
        else if($term == "recently_updated") {
            return $this->builder->orderBy("updated_at", "DESC");
        }

    }


    /**
     * Filtrar por categoría
     * @param  [type] $term [description]
     * @return [type]       [description]
     */
    public function category($term)
    {
        if(is_numeric($term)) {
            return $this->builder->where("category_id", $term);
        }
    	
    }

    



}