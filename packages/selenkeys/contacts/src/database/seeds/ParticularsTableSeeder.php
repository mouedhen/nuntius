<?php

use Illuminate\Database\Seeder;

class ParticularsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Selenkeys\Contacts\App\Models\Particular::class, 20)->create();
    }
}
