<?php
/**
 * JobResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Jobs;


use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class JobResource extends Resource
{
    public function toArray($request)
    {
        $employeesCollectionResource = new class ($this->employees) extends ResourceCollection {
            public function toArray($request)
            {
                return EmployeeResource::collection($this->collection);
            }
        };
        return [
            'id' => $this->id,
            'name' => $this->name,
            'employees' => $employeesCollectionResource,
            'created_at' => (string) $this->created_at,
        ];
    }
}

class EmployeeResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'contact' => $this->contact(),
            'department' => $this->department(),
            'company' => $this->company()
        ];
    }
}
