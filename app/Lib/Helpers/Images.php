<?php
namespace App\Lib\Helpers;

class Images
{

	/**
	 * Resize an image if bigger than indicated, conserving aspect ratio.
	 * @param  Intervention\Image\Image $image
	 * @param  int $maxWidth
	 * @param  int $maxHeight
	 * @return Intervention\Image\Image
	 */
	public static function resizeIfBiggerThan($image, $maxWidth, $maxHeight)
	{
		if($image->width() > $maxWidth) {
			$image->resize($maxWidth, null, function ($constraint) {
			    $constraint->aspectRatio();
			});
		}

		if($image->height() > $maxHeight) {
			$image->resize(null, $maxHeight, function ($constraint) {
			    $constraint->aspectRatio();
			});
		}

		return $image;
	}

}