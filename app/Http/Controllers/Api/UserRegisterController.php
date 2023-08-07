<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserRegisterController extends Controller
{
    public function __invoke(RegisterUserRequest $request)
    {
        try {
            $user = User::create($request->validated());

            return UserResource::make($user)->additional([
                'message' => 'User created successfully',
                'token' => $user->createToken('auth_token')->plainTextToken,
            ]);

        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong'
            ], 500);
        }
    }
}
