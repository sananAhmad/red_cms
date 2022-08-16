<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait ImageTrait
{

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public static function verifyAndUpload($image)
    {
        $image = $image;
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('/images'), $image_name);
        $image_path = "/images/" . $image_name;
        return $image_path;
    }

    public static function getUserId()
    {
        return 5;
    }

    public static function DeleteImage($path)
    {
        if (file_exists(public_path() . $path)) {
            unlink(public_path() . $path);
        }
    }

    public static function UpdateImage($image)
    {
    }
}
