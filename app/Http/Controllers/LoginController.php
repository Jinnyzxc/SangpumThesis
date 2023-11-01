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

        if ($user->user_type === 'seller') {
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
                    'address' => $user->address,
                    'zipCode' => $user->zipCode,
                    'nickname' => $user->nickname,
                    'zodiacSign' => $user->zodiacSign,
                    'kpopGroup' => $user->kpopGroup,    
                    'kpopBias' => $user->kpopBias,
                    'shopName' => $user->shopName,
                    'shopAddress' => $user->shopAddress,
                    'shopZipCode' => $user->shopZipCode,
                    'dateEst' => $user->dateEst,
                    'contactNumber' => $user->contactNumber,
                    'dtiNumber' => $user->dtiNumber,
                    'bankAccNum' => $user->bankAccNum,
                    'govermentId1' => $user->govermentId1,
                    'govermentId2' => $user->govermentId2,
                    'dtiPermit' => $user->dtiPermit,
                    'brgyClearance' => $user->brgyClearance,
                    'businessPermit' => $user->businessPermit
                ];

                $response['url'] = '/seller/dashboard';
            } else {

                $response['error_status'] = '401'; 
                $response['error_data'] = ['Seller account not approved.'];
            }
        } elseif ($user->user_type === 'buyer') {

            Session::put('username', $user->username);
            Session::put('user_type', $user->user_type);

            $response['status'] = true;
            $response['error_data'] = [];
            $response['user_data'] = [
                'user_type' => $user->user_type,
                    'username'  => $user->username,
                    'password' => $user->password,
                    'email'  => $user->email,
                    'firstname'  => $user->firstname,
                    'middlename'  => $user->middleName,
                    'lastname' => $user->lastName,
                    'birthDate'  => $user->birthDate,
                    'nickname'  => $user->nickname,
                    'zodiacSign'  => $user->zodiacSign,
                    'kpopGroup'  => $user->kpopGroup,    
                    'kpopBias'  => $user->kpopBias,
                    'address'  => $user->address,
                    'personalInfoAddress'  => $user->personalInfoAddress,
                    'zipCode'  => $user->zipCode,
                    'bankAccNum'  => $user->bankAccNum,
                    'govermentId1'  => $user->govermentId1,
                    'govermentId2'  => $user->govermentId2   

            ];

            $response['url'] = '/shopping-page';
        } 
    } else {
        $response['error_status'] = '401';
        $response['error_data'] = ['Username/Password does not match in our record.'];
    }

    return response()->json($response);
}

    
}
