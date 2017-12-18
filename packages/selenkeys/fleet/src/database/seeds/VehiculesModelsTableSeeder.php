<?php
/**
 * VehiculesModelsTableSeeder.php
 * Project: nuntius
 */


use Illuminate\Database\Seeder;

class VehiculesModelsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Selenkeys\Fleet\App\Models\VehiculeModel::class, 20)->create();
    }
}