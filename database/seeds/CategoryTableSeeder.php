<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = ['Trains', 'Layout', 'Scales', 'Supplies'];

        foreach($categories as $cat) {
            $category = new Category();
            $category->name = $cat;
            $category->description = 'This is a discription';
            $category->slug = Str::slug($cat, '-');
            $category->save();
        }
    }
}
