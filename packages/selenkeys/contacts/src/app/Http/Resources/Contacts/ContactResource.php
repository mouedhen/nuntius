<?php
/**
 * ContactResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Contacts;


use Illuminate\Http\Resources\Json\Resource;

class ContactResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'zipCode' => $this->zipCode,
            'state' => $this->state,
            'country' => $this->country,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'company' => new Resource($this->company),
            'particular' => new Resource($this->particular),
            'employee' => new Resource($this->employee),
            'emails' => Resource::collection($this->emails),
            'phones' => Resource::collection($this->phones),
        ];
    }
}