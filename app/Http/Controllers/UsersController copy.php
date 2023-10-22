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

        // $this->validate(
        //     $request, 
        //     [
        //         'zeroPageData.username' => 'required|unique:user',
        //         'zeroPageData.password' => ['required', 'min:6'],
        //         'zeroPageData.confirmPassword' => 'required|same:password',
        //         'zeroPageData.email' => 'required|email|unique:user', // Changed 'users' to 'unique:users' for email validation
        //     ],
        //     [
        //         'password.regex' => 'Password must contain at least 1 character, 1 number, and 1 special character'
        //     ]
        // );


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
        $buyer->date_created = now(); // Use the now() function to get the current date and time

        

        if (!$buyer->save()) {
            $response['message'] = 'Error on adding. Contact your support.';
        } else {
            $response['message'] = 'Account Successfully Created!';
            $response['status'] = true;
        }

        return response()->json($response);


}

public function seller (Request $request) {

    $response = $this->json_response;

    // $this->validate(
    //     $request, 
    //     [
    //         'zeroPageData.username' => 'required|unique:user',
    //         'zeroPageData.password' => ['required', 'min:6'],
    //         'zeroPageData.confirmPassword' => 'required|same:password',
    //         'zeroPageData.email' => 'required|email|unique:user', // Changed 'users' to 'unique:users' for email validation
    //     ],
    //     [
    //         'password.regex' => 'Password must contain at least 1 character, 1 number, and 1 special character'
    //     ]
    // );


    $seller = new User;
    $seller->user_type = $request->input('user_type');
    $seller->username = $request->input('username');
    $seller->password = Hash::make($request->input('password'));
    $seller->email = $request->input('email');
    $seller->firstname = $request->input('firstPersonalInfo.firstName');
    $seller->middleName = $request->input('firstPersonalInfo.middleName');
    $seller->lastName = $request->input('firstPersonalInfo.lastName');
    $seller->birthDate = date('Y-m-d',strtotime($request->input('firstPersonalInfo.birthDate')));
    $seller->address = $request->input('firstPersonalInfo.address');
    $seller->zipCode = $request->input('firstPersonalInfo.zipCode');
    $seller->nickname = $request->input('secondPersonalIn.nickname');
    $seller->zodiacSign = $request->input('secondPersonalIn.zodiacSign');
    $seller->kpopGroup = $request->input('secondPersonalIn.kpopGroup');    
    $seller->kpopBias = $request->input('secondPersonalIn.kpopBias');
    $seller->shopName = $request->input('shopInfo.shopName');
    $seller->shopAddress = $request->input('shopInfo.shopAddress');
    $seller->zipCode = $request->input('shopInfo.shopZipCode');
    $seller->dateEst = $request->input('shopInfo.dateEst');
    $seller->contactNumber = $request->input('shopInfo.contactNumber');
    $seller->dtiNumber = $request->input('shopInfo.dtiNumber');
    $seller->bankAccNum = $request->input('credentials.bankAccNum');
    $seller->govermentId1 = $request->input('credentials.govermentId2');
    $seller->govermentId2 = $request->input('credentials.combine_id');
    $seller->dtiPermit = $request->input('credentials.dtiPermit');
    $seller->brgyClearance = $request->input('credentials.brgyClearance');
    $seller->businessPermit = $request->input('credentials.businessPermit');

    $seller->date_created = now(); // Use the now() function to get the current date and time

    if (!$seller->save()) {
        $response['message'] = 'Error on adding. Contact your support.';
    } else {
        $response['message'] = 'Account Successfully Created!';
        $response['status'] = true;
    }

    return response()->json($response);

}

}