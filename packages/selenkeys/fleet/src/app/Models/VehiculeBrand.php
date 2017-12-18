<?php
/**
 * VehiculeBrand.php
 * Project: nuntius
 */

namespace Selenkeys\Fleet\App\Models;


use Illuminate\Database\Eloquent\Model;

class VehiculeBrand extends Model
{
    protected $table = 'vehicules_brands';
    protected $fillable = ['name', 'description'];
}