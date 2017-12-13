<?php
/**
 * PhoneController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Validator;
use Selenkeys\Contacts\App\Http\Resources\Phones\PhoneResource;
use Selenkeys\Contacts\App\Models\Phone;

class PhoneController extends Controller
{
    protected $rules = [
        'phoneNumber' => [
            'required',
            'regex:/^((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))$/'
        ],
        'contact_id' => 'required|integer|exist:contacts,id'
    ];

    public function index()
    {
        return new ResourceCollection(Phone::all());
    }

    public function show($id)
    {
        return new PhoneResource(Phone::findOrFail($id));
    }

    public function store(Request $request)
    {
        $fields = [
            'phoneNumber' => $request->get('phoneNumber'),
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
            'data' => new PhoneResource(Phone::create($fields))
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $fields = [
            'phoneNumber' => $request->get('phoneNumber'),
            'contact_id' => $request->get('contact_id')
        ];

        $validator = Validator::make($fields, $this->rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $email = Phone::findOrFail($id);
        $email->update($fields);

        $data = [
            'success' => true,
            'message' => 'record created successfully',
            'data' => new PhoneResource($email)
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Phone::findOrFail($id)
            ->delete();
        $data = [
            'code' => 204,
            'message' => 'records deleted successfully',
            'data' => $id
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }
}