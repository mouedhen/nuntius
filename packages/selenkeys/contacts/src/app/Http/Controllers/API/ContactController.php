<?php
/**
 * ContactController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Selenkeys\Contacts\App\Http\Resources\Contacts\ContactResource;
use Selenkeys\Contacts\App\Http\Resources\Contacts\ContactsCollectionResource;
use Selenkeys\Contacts\App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return new ContactsCollectionResource(Contact::all());
    }

    public function show($id)
    {
        return new ContactResource(Contact::findOrFail($id));
    }
}