<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gumlet\ImageResize;

class ImageController extends Controller
{
    public function get () {
        return view('image.show');
    }

    public function show (Request $request, $image_path) {

        $img = new ImageResize("storage/images/".$image_path);
        if ($request->filled('width')) {
            $img->resizeToWidth($request->width);
            $img->crop($request->width, $request->height, true, ImageResize::CROPCENTER);
        }

        $img->output(IMAGETYPE_WEBP, 100);
    }
}
