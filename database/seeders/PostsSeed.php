<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'Title example 1',
            'slug' => 'title-example-1',
            'body' => "lorem ipsum welcome to this example",
            'author_id' => 1,
            'status' => 'published',
            'category_id' => 1,
        ]);
        Post::create([
            'title' => 'Title example 2',
            'slug' => 'title-example-2',
            'body' => "lorem ipsum welcome to this example",
            'author_id' => 1,
            'status' => 'published',
            'category_id' => 2,
        ]);
        Post::create([
            'title' => 'Title example 3',
            'slug' => 'title-example-3',
            'body' => "lorem ipsum welcome to this example",
            'author_id' => 1,
            'status' => 'published',
            'category_id' => 3,
        ]);
        Post::create([
            'title' => 'Title example 4',
            'slug' => 'title-example-4',
            'body' => "lorem ipsum welcome to this example",
            'author_id' => 1,
            'status' => 'published',
            'category_id' => 4,
        ]);
    }
}
