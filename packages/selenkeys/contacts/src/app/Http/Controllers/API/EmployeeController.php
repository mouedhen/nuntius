<?php
/**
 * EmployeeController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Selenkeys\Contacts\App\Http\Resources\Employees\EmployeeResource;
use Selenkeys\Contacts\App\Http\Resources\Employees\EmployeeResourceForCollection;
use Selenkeys\Contacts\App\Models\Employee;

class EmployeeController extends Controller
{
    protected $rules = [
        'contact_id' => 'required|integer|exist:contacts,id',
        'job_id' => 'nullable|integer|exist:jobs,id',
        'department_id' => 'nullable|integer|exist:departments,id',
        'company_id' => 'required|integer|exist:companies,id',
    ];

    public function index()
    {
        return EmployeeResourceForCollection::collection(Employee::all());
    }

    public function show($id)
    {
        return new EmployeeResource(Employee::findOrFail($id));
    }

    public function store(Request $request)
    {
        $fields = [
            'contact_id' => $request->get('contact_id'),
            'job_id' => $request->get('contact_id'),
            'department_id' => $request->get('contact_id'),
            'company_id' => $request->get('contact_id'),
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
            'data' => new EmployeeResource(Employee::create($fields))
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $fields = [
            'contact_id' => $request->get('contact_id'),
            'job_id' => $request->get('contact_id'),
            'department_id' => $request->get('contact_id'),
            'company_id' => $request->get('contact_id'),
        ];

        $validator = Validator::make($fields, $this->rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $employee = Employee::findOrFail($id);
        $employee->update($fields);

        $data = [
            'success' => true,
            'message' => 'record created successfully',
            'data' => new EmployeeResource($employee)
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)
            ->delete();
        $data = [
            'code' => 204,
            'message' => 'records deleted successfully',
            'data' => $id
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }
}