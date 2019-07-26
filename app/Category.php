<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   

	protected $guarded = [];

    public $timestamps = false;


    /**
     * Obtain the next order number of the category table. (It's basically an auto-increment)
     * @return [type] [description]
     */
    public static function getNextOrder()
    {
        $lastOrder = self::orderBy("order", "DESC")->limit(1)->value("order");
        if(!$lastOrder)
            return 1;
        else
            return $lastOrder+1;
    }


    /**
     * Get all categories with their nested subcategories.
     * @return [type] [description]
     */
    public static function getAll()
    {
        return self::with("subcategories")->ordered()->get();
    }


    /**
     * Get array of ids of all the existing categories (used for validation).
     * @return array
     */
    public static function getIds()
    {
        return self::pluck("id")->toArray();
    }



    public function subcategories()
    {
    	return $this->hasMany("App\Subcategory");
    }



    /**
     * Scope a query for the categories ordered by their 'order' property.
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeOrdered($query)
    {
    	return $query->orderBy("order", "ASC");
    }




}
