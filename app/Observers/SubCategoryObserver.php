<?php

namespace App\Observers;

use App\Models\SubCategory;

class SubCategoryObserver
{
    /**
     * Handle the sub category "created" event.
     *
     * @param  \App\App\Models\SubCategory  $subCategory
     * @return void
     */
    public function created(SubCategory $subCategory)
    {
        //
    }

    /**
     * Handle the sub category "updated" event.
     *
     * @param  \App\App\Models\SubCategory  $subCategory
     * @return void
     */
    public function updated(SubCategory $subCategory)
    {
        //
    }

    /**
     * Handle the sub category "deleted" event.
     *
     * @param  \App\App\Models\SubCategory  $subCategory
     * @return void
     */
    public function deleted(SubCategory $subCategory)
    {
      $image = $subCategory->image;
      Storage::disk('sub_category_images')->delete($image);
      Storage::disk('thumbnails')->delete($image);
    }

    /**
     * Handle the sub category "restored" event.
     *
     * @param  \App\App\Models\SubCategory  $subCategory
     * @return void
     */
    public function restored(SubCategory $subCategory)
    {
        //
    }

    /**
     * Handle the sub category "force deleted" event.
     *
     * @param  \App\App\Models\SubCategory  $subCategory
     * @return void
     */
    public function forceDeleted(SubCategory $subCategory)
    {
        //
    }
}
