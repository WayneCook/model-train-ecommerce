<?php
namespace App\Repositories;
use App\Models\ProductImage;



class ImageRepository
{

    private $productImage;

    public function __construct(ProductImage $productImage)
    {
        $this->productImage = $productImage;
    }

    public function test($request)
    {
      dd($request);
    }


}
