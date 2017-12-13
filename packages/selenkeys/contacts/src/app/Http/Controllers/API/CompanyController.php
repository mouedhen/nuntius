<?php
/**
 * CompanyController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Validator;
use Selenkeys\Contacts\App\Http\Resources\Companies\CompanyResource;
use Selenkeys\Contacts\App\Models\Company;

class CompanyController extends Controller
{
    protected $rules = [
        'contact_id' => 'required|integer|exist:contacts,id',
        'taxRegistrationNumber' => [
            'nullable',
            'regex:/^\d{7}\w{3}\d{3}$/',
            'unique:companies'
        ],
    ];

    public function index()
    {
        return new ResourceCollection(Company::all());
    }

    public function show($id)
    {
        return new CompanyResource(Company::findOrFail($id));
    }

    public function store(Request $request)
    {
        $fields = [
            'taxRegistrationNumber' => $request->get('taxRegistrationNumber'),
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
            'data' => new CompanyResource(Company::create($fields))
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $fields = [
            'taxRegistrationNumber' => $request->get('taxRegistrationNumber'),
            'contact_id' => $request->get('contact_id')
        ];

        $validator = Validator::make($fields, $this->rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $company = Company::findOrFail($id);
        $company->update($fields);

        $data = [
            'success' => true,
            'message' => 'record created successfully',
            'data' => new CompanyResource($company)
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Company::findOrFail($id)
            ->delete();
        $data = [
            'code' => 204,
            'message' => 'records deleted successfully',
            'data' => $id
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }
}