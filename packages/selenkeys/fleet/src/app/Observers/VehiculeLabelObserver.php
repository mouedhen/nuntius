<?php
/**
 * VehiculeLabelObserver.php
 * Project: nuntius
 */

namespace Selenkeys\Fleet\App\Observers;


use Selenkeys\Fleet\App\Models\Vehicule;

class VehiculeLabelObserver
{
    public function creating(Vehicule $vehicule)
    {
        $vehicule->abv = 'VH';
        $vehicule->setLabel();
    }
}