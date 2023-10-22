<?php

namespace App\Http\Controllers;
use App\Models\Orderedproduct;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class OrderedproductController extends Controller
{
    private $json_response = ['status' => false, 'message' => 'Failed', 'data' => []];

    public function ordered (Request $request) {

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


        $orderedproduct = new Orderedproduct;
        $orderedproduct->Order_id = $request->Order_id;
        $orderedproduct->Product_id	 = $request->Product_id;
        $orderedproduct->date_created = now(); // Use the now() function to get the current date and time

        

        if (!$orderedproduct->save()) {
            $response['message'] = 'Error on adding. Contact your support.';
        } else {
            $response['message'] = 'Account Successfully Created!';
            $response['status'] = true;
        }

        return response()->json($response);


}

}