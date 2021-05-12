<?php

$factory->define(App\Models\newprac::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password'=>$faker->text,
    ];
});

?>