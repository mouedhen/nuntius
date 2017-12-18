<?php
/**
 * VehiculeModelFactory.php
 * Project: nuntius
 */

use Faker\Generator as Faker;

$factory->define(Selenkeys\Fleet\App\Models\VehiculeModel::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'description' => $faker->text(100),
        'vehicule_brand_id' => \Selenkeys\Fleet\App\Models\VehiculeBrand::inRandomOrder()->first()->id,
    ];
});
