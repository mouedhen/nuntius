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
 * @property \Selenkeys\Contacts\App\Models\Company $company
 * @property \Selenkeys\Contacts\App\Models\Particular $particular
 * @property \Selenkeys\Contacts\App\Models\Employee $employee
 * @property \Selenkeys\Contacts\App\Models\Email[] $emails
 * @property \Selenkeys\Contacts\App\Models\Phone[] $phones
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['name', 'address', 'zipCode', 'state', 'country'];

    public function company()
    {
        return $this->hasOne(Company::class, 'contact_id');
    }

    public function particular()
    {
        return $this->hasOne(Particular::class, 'contact_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'contact_id');
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}
