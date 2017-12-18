<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(ParticularsTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(EmailsTableSeeder::class);
        $this->call(PhonesTableSeeder::class);
    }
}
