<?php

use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Database\Seeder;

class CategoryForPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        $category = new Category();
        $category->name = "Main category";
        $category->generateSlug();
        $category->save();

        foreach($posts as $post) {
            $post->categories()->attach($category);
            $post->save();
        }
    }
}
