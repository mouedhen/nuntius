<?php
/**
 * EmailsCollectionResource.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Resources\Emails;


use Illuminate\Http\Resources\Json\ResourceCollection;

class EmailsCollectionResource extends ResourceCollection
{
    public function toArray($request)
    {
        return SimpleEmailResource::collection($this->collection);
    }
}