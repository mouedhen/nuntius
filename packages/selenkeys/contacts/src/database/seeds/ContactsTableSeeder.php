<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Selenkeys\Contacts\App\Models\Contact::class, 20)->create();
    }
}
