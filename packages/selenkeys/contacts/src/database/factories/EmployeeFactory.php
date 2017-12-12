<?php
/**
 * EmployeeFactory.php
 * Project: nuntius
 */


use Faker\Generator as Faker;

$factory->define(Selenkeys\Contacts\App\Models\Employee::class, function (Faker $faker) {
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
        'contact_id' => factory(\Selenkeys\Contacts\App\Models\Contact::class)
            ->create(['name' => $faker->name])->id,
        'department_id' => \Selenkeys\Contacts\App\Models\Department::inRandomOrder()->first()->id,
        'job_id' => \Selenkeys\Contacts\App\Models\Job::inRandomOrder()->first()->id,
        'company_id' => \Selenkeys\Contacts\App\Models\Company::inRandomOrder()->first()->id,
    ];
});
