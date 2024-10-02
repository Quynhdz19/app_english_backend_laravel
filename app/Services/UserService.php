<?php

namespace App\Services;

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

    public function register($name, $email,$password)
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
    public function getUser($id){
        $user =User::query()->where('id',$id)->delete();
        return $user;
    }



    public function getPoint($id){
        return User::query()->where('id',$id)->value('point');
    }
}

