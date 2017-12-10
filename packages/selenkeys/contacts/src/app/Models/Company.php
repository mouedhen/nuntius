<?php
/**
 * Company.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property string $taxRegistrationNumber \d{7}\w{3}\d{3}
 * @property \Selenkeys\Contacts\App\Models\Contact $contact
 * @property \Selenkeys\Contacts\App\Models\Employee[] $employees
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = ['taxRegistrationNumber', 'contact_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}