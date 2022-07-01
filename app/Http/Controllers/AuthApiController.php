<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Cache\Store;
use App\Http\Requests\LoginApiRequest;
use App\Http\Requests\StoreRegisterReguest;

class AuthApiController extends Controller
{

    public function register(StoreRegisterReguest $request)
    {

        $validated_form_data = $request->validated();

        $user = User::create([
            'name' => $validated_form_data['name'],
            'email' => $validated_form_data['email'],
            'phone' => $validated_form_data['phone'],
            'password' => bcrypt($validated_form_data['password']),
            'role' => 3,
        ]);

        $token = $this->createUserToken($user);

        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(LoginApiRequest $request)
    {

        $validated_form_data = $request->validated();

        $user = User::where('email', $validated_form_data['email'])->first();

        if (!$user or !Hash::check($validated_form_data['password'], $user->password)) {

            return response([
                'error_message' => 'Email or Pasword is not correct!'
            ], 401);
        }

        $token = $this->createUserToken($user);

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function createUserToken($user)
    {

        return $user->createToken('authToken')->plainTextToken;
    }
}
