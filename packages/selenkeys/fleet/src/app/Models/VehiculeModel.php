<?php
/**
 * VehiculeModel.php
 * Project: nuntius
 */

namespace Selenkeys\Fleet\App\Models;


use Illuminate\Database\Eloquent\Model;

class VehiculeModel extends Model
{
    protected $table = 'vehicules_models';
    protected $fillable = ['name', 'decription', 'vehicule_brand_id'];
}