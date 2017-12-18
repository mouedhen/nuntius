<?php
/**
 * JobController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Validator;
use Selenkeys\Contacts\App\Http\Resources\Jobs\JobResource;
use Selenkeys\Contacts\App\Models\Job;

class JobController extends Controller
{
    protected $rules = [
        'name' => 'required'
    ];

    public function index()
    {
        return new ResourceCollection(Job::all());
    }

    public function show($id)
    {
        return new JobResource(Job::findOrFail($id));
    }

    public function store(Request $request)
    {
        $fields = [
            'name' => $request->get('name'),
            'description' => $request->get('description')
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
            'data' => new JobResource(Job::create($fields))
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $fields = [
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ];

        $validator = Validator::make($fields, $this->rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $job = Job::findOrFail($id);
        $job->update($fields);

        $data = [
            'success' => true,
            'message' => 'record created successfully',
            'data' => new JobResource($job)
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Job::findOrFail($id)
            ->delete();
        $data = [
            'code' => 204,
            'message' => 'records deleted successfully',
            'data' => $id
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }
}