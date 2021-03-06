<?php
/**
 * EmailController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Validator;
use Selenkeys\Contacts\App\Http\Resources\Emails\EmailResource;
use Selenkeys\Contacts\App\Models\Email;

class EmailController extends Controller
{
    protected $rules = [
        'email' => 'required|email',
        'contact_id' => 'required|integer|exist:contacts,id'
    ];

    public function index()
    {
        return new ResourceCollection(Email::all());
    }

    public function show($id)
    {
        return new EmailResource(Email::findOrFail($id));
    }

    public function store(Request $request)
    {
        $fields = [
            'email' => $request->get('email'),
            'contact_id' => $request->get('contact_id')
        ];

        $validator = Validator::make($fields, $this->rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $data = [
            'success' => true,
            'message' => 'record created successfully',
            'data' => new EmailResource(Email::create($fields))
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $fields = [
            'email' => $request->get('email'),
            'contact_id' => $request->get('contact_id')
        ];

        $validator = Validator::make($fields, $this->rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $email = Email::findOrFail($id);
        $email->update($fields);

        $data = [
            'success' => true,
            'message' => 'record created successfully',
            'data' => new EmailResource($email)
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Email::findOrFail($id)
            ->delete();
        $data = [
            'code' => 204,
            'message' => 'records deleted successfully',
            'data' => $id
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }
}
