<?php
/**
 * ParticularFactory.php
 * Project: nuntius
 */

use Faker\Generator as Faker;

$factory->define(Selenkeys\Contacts\App\Models\Particular::class, function (Faker $faker) {
    return [
        'cinPassport' => $faker->unique()->regexify('\d{8}'),
        'contact_id' => factory(\Selenkeys\Contacts\App\Models\Contact::class)->states('company')->create()->id
    ];
});