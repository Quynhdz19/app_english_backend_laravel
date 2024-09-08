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
}
