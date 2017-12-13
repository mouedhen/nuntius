<?php
/**
 * EmailFormRequest.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Selenkeys\Core\App\Http\Requests\API\AbstractAPIFormRequest;

class EmailFormRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'contact_id' => 'required|integer|exist:contacts,id'
        ];
    }
}