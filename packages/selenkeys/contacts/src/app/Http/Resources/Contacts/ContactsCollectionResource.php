<?php
/**
 * ContactsCollectionResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Contacts;


use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactsCollectionResource extends ResourceCollection
{
    public function toArray($request)
    {
        return ContactResource::collection($this->collection);
    }
}