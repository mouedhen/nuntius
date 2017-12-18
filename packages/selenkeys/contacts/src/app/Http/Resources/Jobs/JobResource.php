<?php
/**
 * JobResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Jobs;


use Illuminate\Http\Resources\Json\Resource;

class JobResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'employees' => $this->employees,
        ];
    }
}