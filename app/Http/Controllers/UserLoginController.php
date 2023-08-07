<?php

namespace App\Http\Controllers;

use App\Http\Enums\UserRolesEnums;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Hash;

class UserLoginController extends Controller
{
    public function __invoke(LoginUserRequest $request)
    {

        try {

            $user = User::where(['email' => $request->safe()['email'],'role' => UserRolesEnums::User->value])->first();


            if (!$user || !Hash::check($request->safe()['password'], $user->password)) {
                return response()->json([
                    'message' => 'The provided credentials do not match our records.'
                ], 401);
            }

            return response()->json([
                'message' => 'User logged in successfully',
                'token' => $user->createToken('auth_token')->plainTextToken,
            ]);


        }catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

    }
}
