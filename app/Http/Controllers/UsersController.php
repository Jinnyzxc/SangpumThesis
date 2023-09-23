<?php

namespace App\Http\Controllers;
use App\Models\User; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class UsersController extends Controller
{
    private $json_response = ['status' => false, 'message' => 'Failed', 'data' => []];

    public function add(Request $request) {
        $response = $this->json_response;

        $this->validate(
            $request, 
            [
                'username' => 'required|unique:user',
                'password' => ['required', 'min:6'],
                'confirmPassword' => 'required|same:password',
                'email' => 'required|email|unique:user', // Changed 'users' to 'unique:users' for email validation
            ],
            [
                'password.regex' => 'Password must contain at least 1 character, 1 number, and 1 special character'
            ]
        );

        $user = new User;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->date_created = now(); // Use the now() function to get the current date and time

        if (!$user->save()) {
            $response['message'] = 'Error on adding. Contact your support.';
        } else {
            $response['message'] = 'Account Successfully Created!';
            $response['status'] = true;
        }

        return response()->json($response);
    }
}
