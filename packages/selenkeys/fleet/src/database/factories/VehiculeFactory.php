<?php
/**
 * VehiculeFactory.php
 * Project: nuntius
 */

use Faker\Generator as Faker;

$factory->define(Selenkeys\Fleet\App\Models\Vehicule::class, function (Faker $faker) {
    return [
        'license_plate' => $faker->unique()->regexify('^\d{8}TUN\d{3}$'),
        'chassis_number' => $faker->unique()->regexify('^[A-HJ-NPR-Z0-9]{17}$'),
        'acquisition_date' => $faker->date(),
        'power' => $faker->randomNumber(),
        'horse_power' => $faker->randomNumber(),
        'color' => $faker->hexColor,
        'seats_number' => $faker->randomNumber(),
        'fuel_type' => $faker->randomElement(['gasoline', 'diesel', 'electric', 'hybrid', 'gas']),
        'state' => $faker->randomElement(['good', 'medium', 'bad', 'off']),
        'vehicule_model_id' => \Selenkeys\Fleet\App\Models\VehiculeModel::inRandomOrder()->first()->id,
    ];
});
