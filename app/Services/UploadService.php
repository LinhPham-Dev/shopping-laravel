<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 *
 *
 */
class UploadService
{

    // Upload Image Avatar
    public function uploadImageHandler($file, $productName)
    {

        $extension = $file->extension();

        // Customize Image Url
        $time = date('Y-m-d-H-i-s-');
        $name = Str::slug($productName) . '.';
        $imageName = $time . $name . $extension;

        // Upload
        $resultImageAvatar = $file->move('uploads/products/product_avatar', $imageName);

        if ($resultImageAvatar) {
            return $imageName;
        }
    }

    // Upload Image Detail
    public function uploadImageDetailHandler($file, $productName, $key)
    {
        $extension = $file->extension();

        // Customize Image Url
        $time = date('Y-m-d-H-i-s-');
        $name = Str::slug($productName) . '-detail-' . $key + 1 . '.';
        $imageNameDetail = $time . $name . $extension;

        // Uploads
        $resultImageDetail = $file->move('uploads/products/product_details', $imageNameDetail);

        if ($resultImageDetail) {
            return $imageNameDetail;
        }
    }

    public function deleteFile($filename, $path)
    {
        if (File::exists($path . $filename)) {
            File::delete($path . $filename);
        }
    }
}
