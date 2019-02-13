<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\User::class, 5)->create()->each(function ($user) {
            $user->posts()->saveMany(factory(App\Post::class, 3)->make())->each(
                function ($post) {
                    $post->tags()->saveMany(factory(App\Tag::class, 2)->make());
                });
        });

    }
}
