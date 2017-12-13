<?php
/**
 * ContactFactory.php
 * Project: nuntius
 */

use Faker\Generator as Faker;

$factory->define(Selenkeys\Contacts\App\Models\Contact::class, function (Faker $faker) {

    return [
        'name' => $faker->name(),
        'address' => $faker->address,
        'zipCode' => $faker->postcode,
        'state' => $faker->city,
        'country' => $faker->country,
    ];
});


$factory->state(Selenkeys\Contacts\App\Models\Contact::class, 'company', function (Faker $faker) {

    return [
        'name' => $faker->company,
    ];
});
