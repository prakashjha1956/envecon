<?php

$factory->define(App\Status::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "description" => $faker->name,
    ];
});
