<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        'role_id' => $faker->numberBetween(1,3),
        'is_active' => $faker->numberBetween(0,1),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'category_id' => $faker->numberBetween(1,10),
        'photo_id' => $faker->numberBetween(1,10),
        'title' => $faker->sentence(7,11),
        'body' => $faker->paragraphs(rand(10,15),true),
        'slug' => $faker->slug(),
    ];
});


$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->randomElement(['administrator','author','subscriber']),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->randomElement(['PHP','JS','JAVA','.NET',"C++","C#"]),
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
      'file' => 'placeholder.jpg'
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id' =>  $faker->numberBetween(1,10),
        'is_active' => 1,
        'photo' => 'placeholder.jpg',
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true)
    ];
});

$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {
    return [
        'comment_id' => $faker->numberBetween(1,10),
        'is_active' => 1,
        'photo' => 'placeholder.jpg',
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true)
    ];
});
