<?php
/**
 * Particular.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $cinPassport
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Selenkeys\Contacts\App\Models\Contact $contact
 */
class Particular extends Model
{
    protected $table = 'particulars';
    protected $fillable = ['cinPassport', 'contact_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
}
