<?php

namespace App\Http\Controllers\SOAP;

use App\Http\Controllers\Controller;
use App\SOAP\LoginService;
use App\Models\User;
use http\Env\Request;
use Laminas\Server\Cache;

class LoginController extends Controller
{
    protected LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->soapService->verifyUser($credentials['username'], $credentials['password'])) {
            $user = User::where('email', $credentials['email'])->first();
            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }
}
