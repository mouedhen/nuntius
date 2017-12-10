<?php
/**
 * ContactFactory.php
 * Project: nuntius
 */

use Faker\Generator as Faker;

$factory->define(Selenkeys\Contacts\App\Models\Contact::class, function (Faker $faker) {

    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'zipCode' => $faker->postcode,
        'state' => $faker->city,
        'country' => $faker->country,
    ];
});
