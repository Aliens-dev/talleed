<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'ثقافة',
            'slug' => 'culture'
        ]);
        Category::create([
            'name' => 'صحة',
            'slug' => 'health'
        ]);
        Category::create([
            'name' => 'علوم',
            'slug' => 'science'
        ]);
        Category::create([
            'name' => 'تكنولوجيا',
            'slug' => 'technology'
        ]);
        Category::create([
            'name' => 'اقتصاد',
            'slug' => 'economy'
        ]);
        Category::create([
            'name' => 'تاريخ',
            'slug' => 'history'
        ]);
        Category::create([
            'name' => 'فضاء',
            'slug' => 'space'
        ]);
        Category::create([
            'name' => 'فن',
            'slug' => 'art'
        ]);
    }
}
