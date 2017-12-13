<?php
/**
 * PhoneResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Phones;


use Illuminate\Http\Resources\Json\Resource;

class PhoneResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'phoneNumber' => $this->phoneNumber,
            'contact' => $this->contact
        ];
    }
}