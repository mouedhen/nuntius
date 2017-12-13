<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Selenkeys\Contacts\App\Models\Company::class, 20)->create();
    }
}
