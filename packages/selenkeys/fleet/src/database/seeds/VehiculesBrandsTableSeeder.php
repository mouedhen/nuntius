<?php
/**
 * VehiculesBrandsTableSeeder.php
 * Project: nuntius
 */

use Illuminate\Database\Seeder;

class VehiculesBrandsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Selenkeys\Fleet\App\Models\VehiculeBrand::class, 20)->create();
    }
}
