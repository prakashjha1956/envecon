<?php

$factory->define(App\RequestToTechnical::class, function (Faker\Generator $faker) {
    return [
        "project_id" => factory('App\TimeProject')->create(),
        "work_type_id" => factory('App\TimeWorkType')->create(),
        "priority" => collect(["High and Critical","High","Medium","Low",])->random(),
        "request_name" => $faker->name,
        "small_description" => $faker->name,
        "name_id" => factory('App\Status')->create(),
    ];
});
