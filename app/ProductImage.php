<?php

namespace App;

use App\Lib\Helpers\Images;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;

class ProductImage extends Model
{


	/**
	 * The directory in default storage (public) where the product images are saved at first.
	 */
    const IMG_DIR = "imgs/products";



    protected $guarded = [];



    /**
     * Save an image with its thumbnails, and create a new ProductImage (without an associated product).
     * @param \Illuminate\Http\UploadedFile $uploadedFile
     * @return ProductImage
     */
    public static function createFromFile($uploadedFile)
    {
    	$image = Image::make($uploadedFile);
    	
    	$image->encode("jpg");
    	$image = Images::resizeIfBiggerThan($image, 1920, 1080);

    	$squareImage = clone $image;
    	$squareImage->fit(800);

    	$thumbnail = clone $image;
    	$thumbnail->fit(300);

    	$fileName = self::generateName();

    	$imgPath = self::IMG_DIR."/".$fileName.".jpg";
    	$squareImgPath = self::IMG_DIR."/".$fileName."_square.jpg";
    	$thumbnailImgPath = self::IMG_DIR."/".$fileName."_thumbnail.jpg";

    	Storage::put($imgPath, $image->stream());
    	Storage::put($squareImgPath, $squareImage->stream());
    	Storage::put($thumbnailImgPath, $thumbnail->stream());

    	return self::create([
    		"path" => $imgPath,
    		"square_path" => $squareImgPath,
    		"thumbnail_path" => $thumbnailImgPath
    	]);
   	}


    /**
     * Generate a random name for the product image.
     * @return string
     */
    public static function generateName()
    {
    	return uniqid(true);
    }


    /**
     * Return query of images with any of the ids provided.
     * @param  string $ids array of ids in JSON format
     * @return [type]      [description]
     */
    public static function findByJsonIds($ids)
    {
    	$ids = json_decode($ids);
    	return self::whereIn("id", $ids);
    }


    /**
     * Associate a group of images given its ids, to a certain product id, and place the order in which they come in the array.
     * @param  array $imgIds    array of image ids.
     * @param  int $productId
     * @return void
     */
    public static function associateImgsToProductAndReorder($imgIds, $productId) 
    {
    	$order = 1;
    	foreach($imgIds as $imageId) {
    		if($image = self::find($imageId)) {

    			$image->order = $order;
    			
    			if($image->product_id != $productId) {
	    			$image->product_id = $productId;
	    			$image->moveFilesToProductDir($productId);
    			}
    			$image->save();

    			$order++;
    		}
    	}
    }



    /**
     * Scope a query and return an associative array, with the key as the images ids, and the value as their thumbnail urls.
     * Used for pre loading dropzone.js.
     * @return array
     */
    public function scopeIdsAndThumbnailsJson($query)
    {
    	$imgs = $query->pluck("thumbnail_path", "id")->toArray();

    	$order = 1;
    	$orderedImgs = [];

    	foreach($imgs as $key => $value) {
    		$orderedImgs[$order]["id"] = $key;
    		$orderedImgs[$order]["url"] = Storage::url($value);
    		$order++;
    	}
    	return json_encode($orderedImgs);
    }


    /**
     * Scope a query to order the images by their order attribute.
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeOrdered($query)
    {
    	return $query->orderBy("order", "ASC");
    }



    /**
     * Get the URL of the full sized image.
     * @return string
     */
    public function url()
    {
    	return Storage::url($this->path);
    }


    /**
     * Get the URL of the thumbnail image.
     * @return string
     */
    public function thumbnailUrl()
    {
        return Storage::url($this->thumbnail_path);
    }


    /**
     * Delete the images from disk, and the model itself.
     * @return void
     */
    public function delete()
    {
    	Storage::delete($this->path);
    	Storage::delete($this->square_path);
    	Storage::delete($this->thumbnail_path);

    	parent::delete();
    }


    /**
     * Moves the files of this image to a product directory. 
     * Used for images which haven't been assigned to a product and are in the main directory.
     * @param  int $productId
     * @return [type]            [description]
     */
    public function moveFilesToProductDir($productId)
    {
    	$attrs = ["path", "square_path", "thumbnail_path"];

    	foreach($attrs as $attr) {

    		$fileName = basename($this->{$attr});
    		$newPath = self::IMG_DIR."/".$productId."/".$fileName;

    		Storage::move($this->{$attr}, $newPath);
    		$this->{$attr} = $newPath;
    	}
    }


}
