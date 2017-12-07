<?php
/**
 * Email.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email : ^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$
 * @property Contact $contact
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Email extends Model
{
    protected $table = 'emails';
    protected $fillable = ['email'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}