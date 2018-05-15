<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required',
        ]);


        try {

            if (! $token = $this->jwt->attempt($request->only('email', 'password'))) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent' => $e->getMessage()], 500);

        }

        return response()->json(compact('token'));
    }


    /**
     * @param Request $request
     * @return User
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createUser(Request $request) {
        $this->validate($request, [
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required',
            'name'     => 'required'
        ]);

        $data = $request->only('email', 'password', 'name');

        $user = new User();
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->email    = $data['email'];
        $user->name     = $data['name'];
        $user->save();

        return $user;
    }
}