<?php

namespace App\Services;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function register($name, $email, $password)
    {
        return User::insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

    }

    public function login($username, $password)
    {
        // select * from users where name = $username
        $users = User::query()->where('name', $username)->get();

        if ($users->isEmpty()) {
            return false;
        }
        foreach ($users as $user) {

            if ($user->password == $password) {
                return true;
            }

        }

        return false;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return true;

    }

    public function updateUser($request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $user->update([
            'name' => $request->only('name'),
            'email' => $request->only('email'),
            'password' => $request->only('password'),
        ]);
        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user,
        ], 200);

    }
}

