<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

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
        // Mã hóa mật khẩu
        $hashedPassword = Hash::make($password);

        // Lưu người dùng mới với mật khẩu đã mã hóa
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
        ]);

        return $user ? true : false;
    }

    public function login($username, $password)
    {
        $user = User::where('email', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            // Đăng nhập thành công
            return $this->generateToken($user);
        }

        return false;
    }

    private function generateToken($user)
    {
        // Logic tạo token JWT
        return auth()->login($user);
    }

    public function getUser($id){
        $user =User::query()->where('id',$id)->delete();
        return $user;
    }

    public function getPoint($id){
        return User::query()->where('id',$id)->value('point');
    }
}

