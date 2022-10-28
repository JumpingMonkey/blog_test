<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogCount = (int)$this->command->ask('How many blog posts would you like?', 50);
        $categories = Category::query()->where('status', true)->get();
        $users = User::query()->get();
        Post::factory($blogCount)->create()->each(function ($post) use($categories, $users){
            $post->categories()->attach($categories->random()->id);
            $post->user()->associate($users->random()->id);
            $post->save();
        });
    }
}
