<?php
/**
 * PhonesTableSeeder.php
 * Project: nuntius
 */

use Illuminate\Database\Seeder;

class PhonesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Selenkeys\Contacts\App\Models\Phone::class, 80)->create();
    }
}
