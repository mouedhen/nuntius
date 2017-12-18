<?php
/**
 * ParticularController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Validator;
use Selenkeys\Contacts\App\Http\Resources\Particulars\ParticularResource;
use Selenkeys\Contacts\App\Models\Particular;

class ParticularController extends Controller
{
    protected $rules = [
        'contact_id' => 'required|integer|exist:contacts,id',
        'cinPassport' => [
            'nullable',
            // 'regex:/^\d{7}\w{3}\d{3}$/',
            'unique:companies'
        ],
    ];

    public function index()
    {
        return new ResourceCollection(Particular::all());
    }

    public function show($id)
    {
        return new ParticularResource(Particular::findOrFail($id));
    }

    public function store(Request $request)
    {
        $fields = [
            'cinPassport' => $request->get('cinPassport'),
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
            'data' => new ParticularResource(Particular::create($fields))
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $fields = [
            'cinPassport' => $request->get('cinPassport'),
            'contact_id' => $request->get('contact_id')
        ];

        $validator = Validator::make($fields, $this->rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $company = Particular::findOrFail($id);
        $company->update($fields);

        $data = [
            'success' => true,
            'message' => 'record created successfully',
            'data' => new ParticularResource($company)
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Particular::findOrFail($id)
            ->delete();
        $data = [
            'code' => 204,
            'message' => 'records deleted successfully',
            'data' => $id
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }
}