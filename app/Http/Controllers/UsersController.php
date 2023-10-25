<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class UsersController extends Controller
{
    private $json_response = ['status' => false, 'message' => 'Failed', 'data' => []];

    public function buyer (Request $request) {

        $this->validate(
            $request, 
            [
            
            'username' => 'required|unique:user',
            'email' => 'required|unique:user'
            ],
        );

        $response = $this->json_response;

        $buyer = new User;
        $buyer->user_type = $request->user_type;
        $buyer->username = $request->username;
        $buyer->password = Hash::make($request['password']);
        $buyer->email = $request->email;
        $buyer->firstname = $request->firstname;
        $buyer->middlename = $request->middlename;
        $buyer->lastname = $request->lastname;
        $buyer->birthDate = $request->birthDate;
        $buyer->nickname = $request->nickname;
        $buyer->zodiacSign = $request->zodiacSign;
        $buyer->kpopGroup = $request->kpopGroup;    
        $buyer->kpopBias = $request->kpopBias;
        $buyer->address = $request->address;
        $buyer->zipCode = $request->zipCode;
        $buyer->bankAccNum = $request->bankAccNum;
        $buyer->govermentId1 = $request->govermentId1;
        $buyer->govermentId2 = $request->govermentId2;
        $buyer->date_created = now();
        
        if (!$buyer->save()) {
            $response['message'] = 'Error on adding. Contact your support.';
        } else {
            $response['message'] = 'Account Successfully Created!';
            $response['status'] = true;
        }
        return response()->json($response);
}

public function seller(Request $request) {
    
    $response = $this->json_response;

    $this->validate(
        $request, 
        [
        
        'username' => 'required|unique:user',
        'email' => 'required|unique:user'
        ],
    );

    
    $seller = new User;
    $seller->user_type = $request->user_type;
    $seller->username = $request->username;
    $seller->password = Hash::make($request['password']);
    $seller->email = $request->email;
    $seller->firstname = $request->firstname;
    $seller->middleame = $request->middlename;
    $seller->lastname = $request->lastname;
    $seller->birthDate = date('Y-m-d', strtotime($request->birthDate));
    $seller->address = $request->address;
    $seller->zipCode = $request->zipCode;
    $seller->nickname = $request->nickname;
    $seller->zodiacSign = $request->zodiacSign;
    $seller->kpopGroup = $request->kpopGroup;    
    $seller->kpopBias = $request->kpopBias;
    $seller->shopName = $request->shopName;
    $seller->shopAddress = $request->shopAddress;
    $seller->shopZipCode = $request->shopZipCode;
    $seller->dateEst = $request->dateEst;
    $seller->contactNumber = $request->contactNumber;
    $seller->dtiNumber = $request->dtiNumber;
    $seller->bankAccNum = $request->bankAccNum;
    $seller->govermentId1 = $request->govermentId1;
    $seller->govermentId2 = $request->govermentId2;
    $seller->dtiPermit = $request->dtiPermit;
    $seller->brgyClearance = $request->brgyClearance;
    $seller->businessPermit = $request->businessPermit;
    $seller->date_created = now();

    if (!$seller->save()) {
        $response['message'] = 'Error on adding. Contact your support.';
    } else {
        $response['message'] = 'Account Successfully Created!';
        $response['status'] = true;
    }

    return response()->json($response);
}

}