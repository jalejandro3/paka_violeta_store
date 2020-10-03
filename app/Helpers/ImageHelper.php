<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Storage;

if (!function_exists('get_image_name')) {
    /**
     * @param string $s3ImageFolder AWS S3 image folder name
     * @param string $name Image file name
     * @return string
     */
    function get_image_name(string $s3ImageFolder, string $name): string
    {
        $pattern = "/{$s3ImageFolder}\//i";

        return preg_replace($pattern, '', $name);
    }
}

if (!function_exists('get_s3_image')) {
    /**
     * @param $image
     * @param string $name
     * @return string
     */
    function get_s3_image(string $name): string
    {
        return Storage::disk('s3')->url('products/' . $name);
    }
}
