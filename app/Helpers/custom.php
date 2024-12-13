<?php

use App\Models\Config;
use Illuminate\Support\Facades\Storage;

if (!function_exists('uploadImage')) {
    /**
     * Handle image upload.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $inputName
     * @param string $folder
     * @return string|null
     */
    function uploadImage($request, $inputName, $folder = 'blogs')
    {
        if ($request->hasFile($inputName)) {
            $imagePath = $request->file($inputName)->store($folder, 'public');
            return $imagePath;
        }
        return null;
    }
    function setting($key, $default = null) {
        return Config::where('key', $key)->value('value') ?? $default;
    }

}
