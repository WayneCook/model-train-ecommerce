<?php

namespace App\Services\Image;
use Image;

class ImageUploadService
{

    //Store image file to disc
    public function uploadImageToDisc($request, $image, $disc)
    {

        $id = $product->id;
        $image = $request->main_image;
        $oldImageUrl = $product->main_image;

        if ($image->store($id, ['disk' => $disc])) {

              // $this->deleteOldProductImage($oldImageUrl);
            // $this->saveProductImage($image, $product);
        }

    }



}
