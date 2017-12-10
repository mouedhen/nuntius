<?php
/**
 * DepartmentFactory.php
 * Project: nuntius
 */

use Faker\Generator as Faker;

$factory->define(Selenkeys\Contacts\App\Models\Department::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20),
        'description' => $faker->text(100)
    ];
});
