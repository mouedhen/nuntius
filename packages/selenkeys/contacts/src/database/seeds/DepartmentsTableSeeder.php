<?php
/**
 * DepartmentsTableSeeder.php
 * Project: nuntius
 */

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Selenkeys\Contacts\App\Models\Department::class, 40)->create();
    }
}
