<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog = new \App\Blog();
        $blog->title = 'Mak student report';
        $blog->contents = 'mak students and freshers included reported on 3rd';
        $blog->save();
    }
}
