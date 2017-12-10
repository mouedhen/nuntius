<?php
/**
 * CompanyFactory.php
 * Project: nuntius
 */

use Faker\Generator as Faker;

$factory->define(Selenkeys\Contacts\App\Models\Company::class, function (Faker $faker) {
    /*
    \Log::info('This is some useful information.');

    $taxRegistrationNumber = $faker->unique()->regexify('\d{7}\w{3}\d{3}');

    $contact = new \Selenkeys\Contacts\App\Models\Contact([
        'name' => $faker->company,
        'address' => $faker->address,
        'zipCode' => $faker->postcode,
        'state' => $faker->city,
        'country' => $faker->country
    ]);

    $contact->save();
    */
    return [
        'taxRegistrationNumber' => $faker->unique()->regexify('\d{7}\w{3}\d{3}'),
        'contact_id' => factory(\Selenkeys\Contacts\App\Models\Contact::class)->create()->id
    ];
});
