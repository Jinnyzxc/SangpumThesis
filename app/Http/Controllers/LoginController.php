<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;

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

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // If you reach here, the user is authenticated, and you have a JWT token.
        $user = JWTAuth::user();
        if ($user->approve == 1) {
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
            $response['error_data'] = ['Account not yet approved.'];
        }
        
        $response['token'] = $token;
        return response()->json($response);
    }

    public function logout(Request $request) {
        JWTAuth::invalidate(JWTAuth::getToken()); // Invalidate the current token
        return response()->json(['message' => 'Successfully logged out']);
    }
}
