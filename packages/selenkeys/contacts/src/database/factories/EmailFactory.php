<?php
/**
 * EmailFactory.php
 * Project: nuntius
 */

use Faker\Generator as Faker;

$factory->define(Selenkeys\Contacts\App\Models\Email::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'contact_id' => \Selenkeys\Contacts\App\Models\Contact::inRandomOrder()->first()->id
    ];
});
