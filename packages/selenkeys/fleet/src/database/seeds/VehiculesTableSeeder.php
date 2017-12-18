<?php
/**
 * VehiculesTableSeeder.php
 * Project: nuntius
 */


use Illuminate\Database\Seeder;

class VehiculesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Selenkeys\Fleet\App\Models\Vehicule::class, 20)->create();
    }
}
