<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
class UserController extends Controller
{

    public $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function getAllUser()
    {
        // select * from users
        return User::all();

    }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        $email = $request->input('email');

        $result = $this->userService->register($name, $email, $password);

        if ($result) {
            return response()->json(['message' => 'User created successfully'], 201);
        } else {
            return response()->json(['message' => 'Failed to create user'], 400);
        }
    }

    public function login(Request $request)
    {
        $username = $request->input('email');
        $password = $request->input('password');

        $result = $this->userService->login($username, $password);
        return $result;
    }

    public function respondWithToken($token): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            [
                'token' => $token
            ]
        );
    }

    public function deleteUser(Request $request)
    {
        $id = $request->input('id');
        $result = $this->userService->getUser($id);
        return response()->json($result);
    }

    public function deleteUser(Request $request)
    {
        $id = $request->input('id');
        $result = $this->userService->deleteUser($id);
        if ($result){
            return response()->json([
                'message' => 'User deleted successfully',
            ],200);
        }
        else{
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

    }

    public function getPoint(request $request){
        $id = $request->input('id');
        $result = $this->userService->getPoint($id);
        return response()->json($result);
    }

    public function updateUser(UpdateUserRequest $request)
    {
        $id = $request->input('id');
        $users = $this->userService->updateUser($request, $id);

        if (!$users) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $users,
        ], 200);

    }

}
