<?php
/**
 * Vehicule.php
 * Project: nuntius
 */

namespace Selenkeys\Fleet\App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Selenkeys\Core\App\Traits\AutoLabelTrait;

class Vehicule extends Model
{
    use Notifiable, AutoLabelTrait;

    protected $table = 'vehicules';
    protected $fillable = ['license_plate', 'chassis_number', 'acquisition_date',
        'power', 'horse_power', 'color', 'seats_number', 'fuel_type', 'state',
        'vehicule_model_id'];
}