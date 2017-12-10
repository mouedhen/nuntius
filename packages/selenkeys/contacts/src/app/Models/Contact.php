<?php

namespace Selenkeys\Contacts\App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $zipCode
 * @property string $state
 * @property string $country
 * @property mixed $contactable
 * @property Email[] $emails
 * @property Phone[] $phones
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['name', 'address', 'zipCode', 'state', 'country'];

    /*
    public function contactable()
    {
        return $this->morphTo();
    }*/

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}
