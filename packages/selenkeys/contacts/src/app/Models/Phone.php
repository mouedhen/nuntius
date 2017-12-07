<?php
/**
 * Phone.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $phoneNumber : ((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))
 * @property Contact $contact
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Phone extends Model
{
    protected $table = 'phones';
    protected $fillable = ['phoneNumber'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
