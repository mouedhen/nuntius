<?php
/**
 * FleetServiceProvider.php
 * Project: nuntius
 */

namespace Selenkeys\Fleet;


use Selenkeys\Core\BaseServiceProvider;
use Selenkeys\Fleet\App\Models\Vehicule;
use Selenkeys\Fleet\App\Observers\VehiculeLabelObserver;

class FleetServiceProvider extends BaseServiceProvider
{
    protected $dir = __DIR__;

    function boot()
    {
        parent::boot();
        Vehicule::observe(VehiculeLabelObserver::class);
    }
}