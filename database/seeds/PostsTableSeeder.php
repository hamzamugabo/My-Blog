<?php

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
        //
        $post = new \App\Post();
        $post->post_name = 'im in love';
        $post->posted_by = 'hamza';
        $post->save();
    }
}
