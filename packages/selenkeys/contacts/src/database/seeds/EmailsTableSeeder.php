<?php
/**
 * EmailsTableSeeder.php
 * Project: nuntius
 */

use Illuminate\Database\Seeder;

class EmailsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Selenkeys\Contacts\App\Models\Email::class, 80)->create();
    }
}
