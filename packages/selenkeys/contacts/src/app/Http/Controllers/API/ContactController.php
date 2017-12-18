<?php
/**
 * ContactController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Validator;
use Selenkeys\Contacts\App\Http\Resources\Contacts\ContactResource;
use Selenkeys\Contacts\App\Models\Contact;

class ContactController extends Controller
{
    // TODO add more validation rules
    protected $rules = [
        'name' => 'required',
    ];

    public function index()
    {
        return new ResourceCollection(Contact::all());
    }

    public function show($id)
    {
        return new ContactResource(Contact::findOrFail($id));
    }

    public function store(Request $request)
    {
        $fields = [
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'zipCode' => $request->get('zipCode'),
            'state' => $request->get('state'),
            'country' => $request->get('country'),
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
            'data' => new ContactResource(Contact::create($fields))
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $fields = [
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'zipCode' => $request->get('zipCode'),
            'state' => $request->get('state'),
            'country' => $request->get('country'),
        ];

        $validator = Validator::make($fields, $this->rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $contact = Contact::findOrFail($id);
        $contact->update($fields);

        $data = [
            'success' => true,
            'message' => 'record created successfully',
            'data' => new ContactResource($contact)
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)
            ->delete();
        $data = [
            'code' => 204,
            'message' => 'records deleted successfully',
            'data' => $id
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }
}
