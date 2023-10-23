<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class UsersController extends Controller
{
    private $json_response = ['status' => false, 'message' => 'Failed', 'data' => []];

    public function buyer (Request $request) {

        $response = $this->json_response;

        $buyer = new User;
        $buyer->user_type = $request->input('zeroPageData.user_type');
        $buyer->username = $request->input('zeroPageData.username');
        $buyer->password = Hash::make($request->input('zeroPageData.password'));
        $buyer->email = $request->input('zeroPageData.email');
        $buyer->firstname = $request->input('firstPageData.firstName');
        $buyer->middleName = $request->input('firstPageData.middleName');
        $buyer->lastName = $request->input('firstPageData.lastName');
        $buyer->bdate = date('Y-m-d',strtotime($request->input('firstPageData.bdate')));
        $buyer->nickname = $request->input('secondPageData.nickname');
        $buyer->zodiacSign = $request->input('secondPageData.zodiacSign');
        $buyer->kpopGroup = $request->input('secondPageData.kpopGroup');    
        $buyer->kpopBias = $request->input('secondPageData.kpopBias');
        $buyer->personalInfoAddress = $request->input('thirdPageData.personalInfoAddress');
        $buyer->zipCode = $request->input('thirdPageData.zipCode');
        $buyer->bankAccNum = $request->input('thirdPageData.bankAccNum');
        $buyer->govermentId1 = $request->input('thirdPageData.govermentId1');
        $buyer->govermentId2 = $request->input('thirdPageData.govermentId2');
        $buyer->combine_id = $request->input('thirdPageData.combine_id');
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
    
    $seller = new User;
    $seller->user_type = $request->user_type;
    $seller->username = $request->username;
    $seller->password = Hash::make($request['password']);
    $seller->email = $request->email;
    $seller->firstname = $request->firstname;
    $seller->middlename = $request->middlename;
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