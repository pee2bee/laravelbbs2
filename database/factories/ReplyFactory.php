<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Reply::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        'content' => $faker->paragraph(3),
    ];
});
