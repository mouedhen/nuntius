<?php
/**
 * EmailController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Selenkeys\Contacts\App\Http\Resources\Emails\EmailsCollectionResource;
use Selenkeys\Contacts\App\Http\Resources\Emails\SimpleEmailResource;
use Selenkeys\Contacts\App\Models\Email;

class EmailController extends Controller
{
    public function index()
    {
        return new EmailsCollectionResource(Email::all());
    }

    public function show($id)
    {
        return new SimpleEmailResource(Email::findOrFail($id));
    }
}