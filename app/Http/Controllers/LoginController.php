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
        'username' => 'required',
        'password' => 'required',
        'user_type' => 'required',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->user_type === 'seller' || $user->user_type === 'buyer') {
            if ($user->approve == 1) {
                Session::put('username', $user->username);
                Session::put('user_type', $user->user_type);

                $response['status'] = true;
                $response['error_data'] = [];
                $response['user_data'] = [
                    'user_type' => $user->user_type,
                    'username' => $user->username,
                    'password' => $user->password,
                    'email' => $user->email,
                    'firstname' => $user->firstname,
                    'middlename' => $user->middleName,
                    'lastname' => $user->lastName,
                    'birthDate'  => $user->birthDate,
                    'nickname' => $user->nickname,
                    'zodiacSign' => $user->zodiacSign,
                    'kpopGroup' => $user->kpopGroup,
                    'kpopBias' => $user->kpopBias,
                    'address' => $user->address,
                    'zipCode' => $user->zipCode,
                    'bankAccNum' => $user->bankAccNum,
                    'govermentId1' => $user->govermentId1,
                    'govermentId2' => $user->govermentId2
                ];

                if ($user->user_type === 'seller') {
                    $response['url'] = '/seller/dashboard';
                } elseif ($user->user_type === 'buyer') {
                    $response['url'] = '/shopping-page';
                }
            } else {
                $response['error_status'] = '401';
                $response['error_data'] = ['Account not yet approve.'];
            }
        } else {
            $response['error_status'] = '401';
            $response['error_data'] = ['Invalid user type.'];
        }
    } else {
        $response['error_status'] = '401';
        $response['error_data'] = ['Username/Password does not match in our record.'];
    }

    return response()->json($response);
}


    
}
