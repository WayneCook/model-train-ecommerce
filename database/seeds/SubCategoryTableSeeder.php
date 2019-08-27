<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\SubCategory;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Locomotives' => '1',
            'Train sets' => '1',
            'Trollys' => '1',
        ];

        foreach($categories as $cat => $val) {
            $category = new SubCategory();
            $category->name = $cat;
            $category->description = 'This is a discription';
            $category->category_id = $val;
            $category->slug = Str::slug($cat, '-');
            $category->save();
        }
    }
}
