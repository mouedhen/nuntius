<?php
/**
 * PhoneFactory.php
 * Project: nuntius
 */

use Faker\Generator as Faker;

$factory->define(Selenkeys\Contacts\App\Models\Phone::class, function (Faker $faker) {
    return [
        'phoneNumber' => $faker->phoneNumber,
        'contact_id' => \Selenkeys\Contacts\App\Models\Contact::inRandomOrder()->first()->id
    ];
});
