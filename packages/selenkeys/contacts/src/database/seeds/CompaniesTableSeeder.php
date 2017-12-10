<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        /*
        $faker = \Faker\Factory::create();
        $taxRegistrationNumber = $faker->unique()->regexify('\d{7}\w{3}\d{3}');

        $contact = new \Selenkeys\Contacts\App\Models\Contact([
            'name' => $faker->company,
            'address' => $faker->address,
            'zipCode' => $faker->postcode,
            'state' => $faker->city,
            'country' => $faker->country
        ]);

        return [
            'taxRegistrationNumber' => $taxRegistrationNumber,
            'contact_id' => $contact->id
        ];
        */
        factory(Selenkeys\Contacts\App\Models\Company::class, 20)->create();
    }
}
