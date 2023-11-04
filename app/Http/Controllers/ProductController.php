<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\SalesInfo;
use App\Models\ShippingInfo;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $json_response = ['status' => false, 'message' => 'Failed', 'data' => []];

    public function product_add(Request $request)
    {
        $response = $this->json_response;

        $this->validate($request, [
            'seller_name' => 'required',
            'product_image' => 'required',
            'product_name' => 'required',
            'sub_category' => 'required',
            'product_description' => 'required',
            'pre_order' => 'required',
            'amount' => "required",
            'price' => 'required|array',
            'stock' => 'required|array',
            'variation' => 'required|array',
            'weight' => 'required',
            'parcel_size_z' => 'required',
            'parcel_size_x' => 'required',
            'parcel_size_y' => 'required',
            'shipping_fee' => 'required',
        ]);

        $productinfo = new Products;
        $productinfo->seller_id = $request->seller_id;
        $productinfo->seller_name = $request->seller_name;
        $productinfo->product_image = $request->product_image;
        $productinfo->product_name = $request->product_name;
        $productinfo->brand = $request->brand;
        $productinfo->category = $request->category;
        $productinfo->sub_category = $request->sub_category;
        $productinfo->product_description = $request->product_description;
        $productinfo->pre_order = $request->pre_order;
        $productinfo->amount = $request->amount;
        $productinfo->date_created = now();

        if (!$productinfo->save()) {
            $response['message'] = 'Error on adding product info. Contact your support.';
        } else { 
            $productinfo_id = $productinfo->id; 

            $arrPrice = $request->price;
            foreach($arrPrice as $key => $value){
                $salesInfo = new SalesInfo;
                $salesInfo->salesinfo_id = $productinfo_id; 
                $salesInfo->price = $value;
                $salesInfo->stock = $request->stock[$key];
                $salesInfo->variation = $request->variation[$key];
                $salesInfo->date_created = now();
            }

            if (!$salesInfo->save()) {
                $response['message'] = 'Error on adding sales info. Contact your support.';
            } else {
                $shippingInfo = new ShippingInfo;
                $shippingInfo->shippinginfo_id = $productinfo_id; // Use the product ID
                $shippingInfo->weight = $request->weight;
                $shippingInfo->parcel_size_z = $request->parcel_size_z;
                $shippingInfo->parcel_size_x = $request->parcel_size_x;
                $shippingInfo->parcel_size_y = $request->parcel_size_y;
                $shippingInfo->shipping_fee = $request->shipping_fee;
                $shippingInfo->date_created = now();

                if (!$shippingInfo->save()) {
                    $response['message'] = 'Error on adding shipping info. Contact your support.';
                } else {
                    $response['message'] = 'Product, Sales Info, and Shipping Info Successfully Created!';
                    $response['status'] = true;
                }
            }
        }

        return response()->json($response);
    }

    public function getAllProducts () {

        $matchTheseSeller = [['seller_id', '=', 0]];
        $arrSeller = Products::where($matchTheseSeller)->get();
        $data['arrSeller'] = $arrSeller;
    
        /*$matchTheseSalesInfo = [['seller_id', '=', 0]];
        $arrSalesInfo = SalesInfo::where($matchTheseSalesInfo)->get();
        $data['SalesInfo'] = $arrSalesInfo;
    
        $matchTheseShippingInfo = [['seller_id', '=', 0]];
        $arrShippingInfo = ShippingInfo::where($matchTheseShippingInfo)->get();
        $data['ShippingInfo'] = $arrShippingInfo;*/
    
        return response()->json($data);
        
    }
    
}
