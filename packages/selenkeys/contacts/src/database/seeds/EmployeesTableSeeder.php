<?php
/**
 * EmployeesTableSeeder.php
 * Project: nuntius
 */

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Selenkeys\Contacts\App\Models\Employee::class, 20)->create();
    }
}
