<?php
/**
 * JobController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Selenkeys\Contacts\App\Http\Resources\Jobs\JobResource;
use Selenkeys\Contacts\App\Http\Resources\Jobs\JobsCollectionResource;
use Selenkeys\Contacts\App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        return new JobsCollectionResource(Job::all());
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

        $validator = Validator::make($fields, [
            'name' => 'required|unique:jobs'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }

        try {
            $data = [
                'success' => true,
                'message' => 'record created successfully',
                'data' => new JobResource(Job::create($fields)),
            ];
            return response()->json($data, 201);
        } catch (QueryException $exception) {
            $data = [
                'success' => false,
                'message' => 'Can not create job',
                'description' => $exception->errorInfo
            ];
            return response()->json($data, 401);
        }
    }

    public function update(Request $request, $id)
    {
        $fields = [
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ];

        $validator = Validator::make($fields, [
            'name' => 'required|unique:jobs'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }

        $job = Job::findOrFail($id);

        try {
            $data = [
                'success' => true,
                'message' => 'records updated successfully',
                'data' => new JobResource($job->update($fields)),
            ];
            return response()->json($data, 201);
        } catch (QueryException $exception) {
            $data = [
                'success' => false,
                'message' => 'Can not create job',
                'description' => $exception->errorInfo
            ];
            return response()->json($data, 401);
        }
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
        return response()->json($data, 204);
    }
}