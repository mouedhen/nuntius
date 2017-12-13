<?php
/**
 * EmailResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Emails;

use Illuminate\Http\Resources\Json\Resource;

class EmailResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'contact' => $this->contact,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
