<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gumlet\ImageResize;

class ImageController extends Controller
{
    public function get () {
        return view('image.show');
    }

    public function show ($image_type, $image_path) {

        $img = new ImageResize("storage/".$image_type."/".$image_path);

        switch ($image_type) {
            case "livros":
                $img->resizeToWidth(576);
                $img->crop(576, 720);   
        }

        $img->output(IMAGETYPE_WEBP, 100);
    }
}
