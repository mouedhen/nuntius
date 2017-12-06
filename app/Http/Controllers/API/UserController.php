<?php

namespace App\Http\Controllers\API;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersCollectionResource;

class UserController extends Controller
{
    public $successStatus = 200;

    /**
     * Login api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('nuntius_token')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    /**
     * Register api
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('nuntius_token')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * Details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function index()
    {
        return new UsersCollectionResource(User::all());
    }

    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        try {
            $data = [
                'success' => true,
                'message' => 'User created successfully',
                'data' => new UserResource(User::create($input))
            ];
            return response()->json($data, $this->successStatus);
        } catch (QueryException $exception) {
            $data = [
                'success' => false,
                'message' => 'Can not create user',
                'description' => $exception->errorInfo
            ];
            return response()->json($data, 401);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();

        if (isset($input['password'])) {
            unset($input['password']);
        }

        try {
            $user = User::findOrFail($id);
            $user->update($input);
            $data = [
                'success' => true,
                'message' => 'User updated successfully',
                'data' => new UserResource($user)
            ];
            return response()->json($data, $this->successStatus);
        } catch (QueryException $exception) {
            $data = [
                'success' => false,
                'message' => 'Can not updated user',
                'description' => $exception->errorInfo
            ];
            return response()->json($data, 401);
        }
    }

    public function destroy($id)
    {
        User::findOrFail($id)
            ->delete();
        $data = [
            'code' => 204,
            'message' => 'record deleted successfully',
        ];
        return response()->json($data, 204);
    }
}
