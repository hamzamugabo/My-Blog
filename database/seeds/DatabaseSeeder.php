<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        Illuminate\Database\Eloquent\::unguard();
         $this->call(UsersTableSeeder::class);
         $this->call(PostsTableSeeder::class);
         $this->call(DevicesTableSeeder::class);
         $this->call(BlogsTableSeeder::class);
    }
}
