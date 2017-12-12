<?php
/**
 * SimpleEmailResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Emails;


use Illuminate\Http\Resources\Json\Resource;

class SimpleEmailResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email
        ];
    }
}