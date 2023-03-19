<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PhotoUploadController extends Controller
{
   public function imageUpload(string $name, int $height, int $width, string $path, $file):string
   {
    $image_name = $name.'.webp';
    Image::make($file)->fit($height, $width)->save(public_path($path).$image_name, 50,'webp' );
    return $image_name;
   }

   public function imageUnlink(string $name, string $path ):void
   {
    $image_path = public_path($path).$name;

    if (file_exists($image_path)){
        unlink($image_path);
    }
   }
}
