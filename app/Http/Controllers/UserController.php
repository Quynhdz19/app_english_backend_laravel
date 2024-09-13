<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

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

        return User::insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        // select * from users where name = $username
        $users = User::query()->where('name', $username)->get();

        if ($users->isEmpty()) {
            return response()->json(['error' => 'User not found'], 404);
        }
        foreach ($users as $user) {

            if ($user->password == $password) {
                return response()->json(['error' => 'oki'], 200);
            }

        }
        return response()->json(['error' => 'error'], 400);

    }
}
