<?php
/**
 * CompanyFactory.php
 * Project: nuntius
 */

use Faker\Generator as Faker;

$factory->define(Selenkeys\Contacts\App\Models\Company::class, function (Faker $faker) {
    return [
        'taxRegistrationNumber' => $faker->unique()->regexify('\d{7}\w{3}\d{3}'),
        'contact_id' => factory(\Selenkeys\Contacts\App\Models\Contact::class)->states('company')->create()->id
    ];
});
