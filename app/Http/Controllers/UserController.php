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
        $username = $request->input('username');
        $password = $request->input('password');

        $result = $this->userService->login($username, $password);

        if ($result) {
            return response()->json(['message' => 'User logged in successfully'], 200);
        } else {
            return response()->json(['message' => 'Login false'], 400);
        }
    }

    public function getUser(request $request){
        $id=$request->input('id');
        $result=$this->userService->getUser($id);
        return response()->json($result);
    }
}
