<?php
/**
 * EmployeeResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Employees;


use Illuminate\Http\Resources\Json\Resource;
use Selenkeys\Contacts\App\Http\Resources\Companies\CompanyResource;

class EmployeeResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'contact' => $this->contact,
            'department' => $this->department,
            'job' => $this->job,
            'company' => new CompanyResource($this->company)
        ];
    }
}