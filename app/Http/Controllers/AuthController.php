<?php


namespace App\Http\Controllers;


use Sczts\Skeleton\Http\Controllers\Controller;
use Sczts\Skeleton\Http\StatusCode;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return $this->json(StatusCode::LOGIN_FAILED,[],200);
        }

        $user = auth('api')->user();
        return $this->json(StatusCode::SUCCESS,[
            'token' => $token,
            'user' => $user,
            'permissions' => $user->permission(),
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function logout()
    {
        auth('api')->logout();
        return $this->json(StatusCode::SUCCESS, ['msg' => '退出登录成功']);
    }

    public function refresh()
    {
        $user = auth('api')->user();
        return $this->json(StatusCode::SUCCESS,[
            'token' => auth('api')->refresh(),
            'user' => $user,
            'permissions' => $user->permission(),
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function info()
    {
        $user = auth('api')->user();
        return $this->json(StatusCode::SUCCESS,[
            'user' => $user,
            'permissions' => $user->permission(),
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
