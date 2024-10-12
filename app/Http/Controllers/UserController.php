<?php

namespace App\Http\Controllers;

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


    public function getPoint(request $request){
        $id = $request->input('id');
        $result = $this->userService->getPoint($id);
        return response()->json($result);
    }

}
