<?php

namespace App\Services\Image;
use Image;

class ImageThumbnailService
{





    public function makeThumbnail($image)
    {

      //Generate thumbnail
      $image = $value;
      $img = Image::make($image->getRealPath());

      $thumbNail = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();

      $destinationPath = 'thumbnails';
      $attribute_name = "main_image_thumbnail";

      $img->resize(100, 100, function ($constraint) {
          $constraint->aspectRatio();
      })->save($destinationPath.'/'.$thumbNail);


        $this->attributes['main_image_thumbnail'] = 'thumbnails/'.$thumbNail;

    }

    public function uploadFileToDisk($value, $attribute_name, $disk, $destination_path)
    {
        $request = \Request::instance();
        // if a new file is uploaded, delete the file from the disk
        if ($request->hasFile($attribute_name) &&
            $this->{$attribute_name} &&
            $this->{$attribute_name} != null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }
        // if the file input is empty, delete the file from the disk
        if (is_null($value) && $this->{$attribute_name} != null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }
        // if a new file is uploaded, store it on disk and its filename in the database
        if ($request->hasFile($attribute_name) && $request->file($attribute_name)->isValid()) {
            // 1. Generate a new file name
            $file = $request->file($attribute_name);
            $new_file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
            // 2. Move the new file to the correct path
            $file_path = $file->storeAs($destination_path, $new_file_name, $disk);
            // 3. Save the complete path to the database
            $this->attributes[$attribute_name] = $file_path;
        }
    }







}
