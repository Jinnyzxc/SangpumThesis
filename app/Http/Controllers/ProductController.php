<?php

namespace App\Http\Controllers;
use App\Models\Products;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class ProductController extends Controller
{
    private $json_response = ['status' => false, 'message' => 'Failed', 'data' => []];

    public function add(Request $request) {
        $response = $this->json_response;

        $this->validate(
            $request, 
            [
                'name' => 'required',
            ]
        );

        $product = new Products;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->group_name = $request->group_name;
        $product->pre_order = $request->pre_order;
        $product->variation = $request->variation;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->sales = $request->sales;
        $product->weight_kg = $request->weight_kg;
        $product->parcel_size = $request->parcel_size;
        $product->shipping_fee = $request->shipping_fee;
        $product->shop_id = $request->shop_id;
        $product->date_created = now(); // Use the now() function to get the current date and time

        if (!$product->save()) {
            $response['message'] = 'Error on adding. Contact your support.';
        } else {
            $response['message'] = 'Account Successfully Created!';
            $response['status'] = true;
        }

        return response()->json($response);

    }
}