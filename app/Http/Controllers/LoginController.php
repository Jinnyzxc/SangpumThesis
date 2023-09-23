<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;  
use App\Models\User;  
use Illuminate\Support\Facades\Session; 

class LoginController extends Controller
{
    private $json_response = array('status' => false, 'error_status' => '200', 'error_data' => array('Username/Password does not match in our record.'));
    
    public function login(Request $request)
    {
        $response = $this->json_response;
        $this->validate($request, [
                'username'    => 'required',
                'password' => 'required',
            ]);

        $credentials = $request->only('username', 'password');

       if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            $user = Auth::user();
            Session::put('username', $user->username);
            Session::put('user_type', $user->user_type);
            $response['status'] = true;
            $response['error_data'] = array();
            $response['url'] = "/home";

        }

        return response()->json($response);
    }
}
