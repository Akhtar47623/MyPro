<?php

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
}
