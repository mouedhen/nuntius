<?php
/**
 * ParticularResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Particulars;


use Illuminate\Http\Resources\Json\Resource;

class ParticularResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cinPassport' => $this->cinPassport,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'contact' => $this->contact,
        ];
    }
}