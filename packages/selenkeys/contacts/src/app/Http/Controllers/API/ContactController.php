<?php
/**
 * ContactController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Selenkeys\Contacts\App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return new ResourceCollection(Contact::all());
    }
}