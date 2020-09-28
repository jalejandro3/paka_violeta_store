<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Storage;

if (!function_exists('store_image')) {
    /**
     * @param $image
     * @param string $name
     */
    function store_image($image, string $name): void
    {
        $extension = $image->extension();
        $imageName = "{$name}.{$extension}";

        Storage::disk('s3')->putFileAs("products", $image, $imageName, 'public');
    }
}

if (!function_exists('get_image_name')) {
    /**
     * @param $image
     * @param string $name
     * @return string
     */
    function get_image_name($image, string $name): string
    {
        return "{$name}.{$image->extension()}";
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
