<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{

	protected $guarded = [];
	
	
   	public $timestamps = false;


    /**
     * Obtain the next order number of a new subcategory belonging to a certain category. (It's basically an auto-increment)
     * @param int $categoryId
     * @return int
     */
    public static function getNextOrder($categoryId)
    {
        $lastOrder = self::where("category_id", $categoryId)->orderBy("order", "DESC")->limit(1)->value("order");
        if(!$lastOrder)
            return 1;
        else
            return $lastOrder+1;
    }




   	public function category()
   	{
   		return $this->belongsTo("App\Category");
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
