<?php

namespace App\Service;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageSubmenuService
{
    public function handleUploadedImage($image)
    {
        $nameImage = '';
        if (!is_null($image)) {
            $manager = new ImageManager(new Driver());
            $images = $manager->read($image);
            $images->resizeCanvas(698, 524);
            $nameImageGen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $images->toPng()->save(public_path('images/submenu/'.$nameImageGen));
            $nameImage = 'images/submenu/'.$nameImageGen;
        }
        return $nameImage;
    }

}
