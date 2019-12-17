<?php

namespace App;

use App\Lib\Helpers\Images;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;


class CarouselItem extends Model
{
 
	const UPLOADED_IMG_DIR = "imgs/storefront/carousel";


    protected $guarded = [];


    /**
     * Obtener URL de imágen.
     * @return [type] [description]
     */
    public function imgUrl()
    {
    	return Storage::url($this->img_path);
    }


    /**
     * [assignImage description]
     * @param  Intervention\Image\Image $image
     * @return [type]                [description]
     */
    public function assignUploadedImage($image)
    {

    	$imgPath = self::UPLOADED_IMG_DIR."/".$this->id.".jpg";
    	
    	$image->encode("jpg");

    	if($image->width() / $image->height() >= 1.3) {  // wide enough (13:10), trim height.
    		$image->fit(800,500); // 8:5 aspect ratio for our slider revolution
    	} 
    	else { // very square, add white space to width.
			$canvas = Image::canvas(800, 500, "#FFFFFF");
			$image->heighten(500);
			$canvas->insert($image, 'center');
			$image = $canvas;
    	}
    	

    	Storage::put($imgPath, $image->stream());

    	$this->img_path = $imgPath;
    	$this->save();
    }


    /**
     * Remove from storage the carousel item image
     * @return [type] [description]
     */
    public function deleteImage()
    {
    	Storage::delete($this->img_path);
    }




}
