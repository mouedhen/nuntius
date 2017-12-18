<?php
/**
 * EmployeesCollectionResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Employees;


use Illuminate\Http\Resources\Json\Resource;

class EmployeeResourceForCollection extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'contact' => $this->contact,
            'job' => $this->job,
            'department' => $this->department,
            'company' => new class ($this->company) extends Resource {
                public function toArray($request)
                {
                    return [
                        'id' => $this->id,
                        'taxRegistrationNumber' => $this->taxRegistrationNumber,
                        'contact' => $this->contact,
                    ];
                }
            }
        ];
    }
}