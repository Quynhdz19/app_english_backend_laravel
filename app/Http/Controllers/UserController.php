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

//    public function register(RegisterUserRequest $request)
//    {
//        // Validate form ( xác thực yêu cầu đến )
//        $validatedData = $request->validate([
//            'name' => 'required|max:255',
//            'email' => 'required|email|unique:users,email',
//            'password' => 'required|min:6',
//        ]);
//
//        // Tạo User mới
//        $user = User::create([
//            'name' => $validatedData['name'],
//            'email' => $validatedData['email'],
//            'password' => bcrypt($validatedData['password']), // Mã hóa mật khẩu
//        ]);
//
//        // Tùy chọn, bạn có thể trả về người dùng đã tạo với thông báo thành công (có thể bỏ)
//        return response()->json([
//            'message' => 'User registered successfully',
//            'user' => $user,
//        ], 201);
//    }


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

    public function deleteUser(Request $request)
    {
        $id=$request->input('id');
        $result=$this->userService->deleteUser($id);
        if($result){
            response()->json([
                'message' => 'User deleted successfully',
            ],200);;
        }
        else{
            response()->json([
                'message' => 'User not found',
            ], 404);
        }

    }
    public function updateUser(UpdateUserRequest $request, $id)
    {
        $id=$request->input('id');
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
