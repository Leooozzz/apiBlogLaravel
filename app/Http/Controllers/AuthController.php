<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function singup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $returnData = [];
        $returnData['user'] = $user;
        $returnData['token'] = $user->createToken($user->id . '-' . $user->email)->plainTextToken;
        return $returnData;
    }
    public  function singin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:8'
        ]);
        $user = User::query()->where('email', $request->email)->first();

        $hashCheck = Hash::check($request->password, $user->password);

        if (!$user || !$hashCheck) {
            return response()->json(['error' => 'Email or password error'], 401);
        }

        $token = $user->createToken($user->id . '-' . $user->email)->plainTextToken;

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ],
            'token' => $token
        ]);
    }
    public function verify(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]
        ]);
    }
}
