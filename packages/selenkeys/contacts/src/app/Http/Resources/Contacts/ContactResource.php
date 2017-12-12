<?php
/**
 * ControllerResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Contacts;


use Illuminate\Http\Resources\Json\Resource;
use Selenkeys\Contacts\App\Http\Resources\Emails\SimpleEmailResource;

class ContactResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->address,
            'zipCode' => $this->zipCode,
            'state' => $this->state,
            'country' => $this->country,
            'emails' => SimpleEmailResource::collection($this->emails),
            'phones' => $this->phones,
            'company' => new class ($this->company) extends Resource
            {
                public function toArray($request)
                {
                    return [
                        'id' => $this->id,
                        'taxRegistrationNumber' => $this->taxRegistrationNumber,
                        'employees' => $this->employees
                    ];
                }
            },
            'employee' => $this->employee
        ];
    }
}
