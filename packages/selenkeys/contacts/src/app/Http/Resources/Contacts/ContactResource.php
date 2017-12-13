<?php
/**
 * ControllerResource.php
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
            'emails' => Resource::collection($this->emails),
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
            'employee' => new class ($this->employee) extends Resource
            {
                public function toArray($request)
                {
                    return [
                        'id' => $this->id,
                        'job' => $this->job,
                        'department' => $this->department,
                        'company' => new class ($this->company) extends Resource
                        {
                            public function toArray($request)
                            {
                                return [
                                    'id' => $this->id,
                                    'contact' => $this->contact,
                                    'employees' => $this->employees
                                ];
                            }
                        }
                    ];
                }
            }
        ];
    }
}
