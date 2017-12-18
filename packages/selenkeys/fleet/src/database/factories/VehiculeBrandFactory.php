<?php
/**
 * VehiculeBrandFactory.php
 * Project: nuntius
 */

use Faker\Generator as Faker;

$factory->define(Selenkeys\Fleet\App\Models\VehiculeBrand::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'description' => $faker->text(100)
    ];
});
