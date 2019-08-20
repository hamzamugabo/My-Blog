<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Post::class, function (Faker $faker) {

//    $id=0;
//    $id++;
//    dd($id);
    return [
        
        'post_name'=> $faker->sentence,
        'posted_by'=> $faker->name,
        'created_at' => Carbon::instance($faker->dateTimeThisMonth())->toDateTimeString(),
        'updated_at' => $faker->dateTimeThisMonth,


        //
    ];
});
