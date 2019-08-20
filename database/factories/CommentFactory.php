<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
    	
        'post_id'=>function (){
        return factory(User::class)->create()->id;
        },
        'comment'=>$faker->paragraph,
        //
    ];
});
