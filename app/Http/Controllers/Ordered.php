<?php

namespace App\Http\Controllers;
use App\Models\Ordered;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class OrderedController extends Controller
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


        $ordered = new Ordered;
        $ordered->order_status = $request->order_status;
        $ordered->buyer_id	 = $request->buyer_id;
        $ordered->product_id = $request->product_id;
        $ordered->date_created = now(); // Use the now() function to get the current date and time

        

        if (!$ordered->save()) {
            $response['message'] = 'Error on adding. Contact your support.';
        } else {
            $response['message'] = 'Account Successfully Created!';
            $response['status'] = true;
        }

        return response()->json($response);


}

}