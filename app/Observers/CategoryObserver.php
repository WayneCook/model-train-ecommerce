<?php

namespace App\Observers;
use Illuminate\Http\Request;
use App\Traits\Sanitizer;
use App\Models\Category;
use Storage;


class CategoryObserver
{

    use Sanitizer;

    /**
     * Handle the product "created" event.
     *
     * @param  \App\Category  $product
     * @return void
     */
    public function created(Category $category)
    {


    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Category  $product
     * @return void
     */
    public function updated(Category $category)
    {


    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Category  $product
     * @return void
     */
    public function deleted(Category $category)
    {


      // Delete product images
      $image = $category->image;
      Storage::disk('category_images')->delete($image);
      Storage::disk('thumbnails')->delete($image);

    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Category  $product
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Category  $product
     * @return void
     */
    public function forceDeleted(Category $category)
    {

    }
}
