<?php

namespace App\Services\Image;

class ImageDeleteService
{

  public function deleteImageFromDisc($disc, Product $product)
  {

    $imageUrl = $product->main_image;
    Storage::disk($disc)->delete($imageUrl);

  }



}
