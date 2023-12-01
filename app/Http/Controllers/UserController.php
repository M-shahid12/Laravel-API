<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Client;


class UserController extends Controller
{


    public function index()
    {
        $users = User::all(); // Replace with your own query

        return view('users.index', ['users' => $users]);
    }

    //
    // login function 
    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our record.']
            ], 404);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}
