<?php
/**
 * CompanyResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Companies;


use Illuminate\Http\Resources\Json\Resource;

class CompanyResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'taxRegistrationNumber' => $this->taxRegistrationNumber,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'contact' => $this->contact,
            'employees' => $this->employees,
        ];
    }
}