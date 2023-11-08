<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\SalesInfo;
use App\Models\ShippingInfo;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $json_response = ['status' => false, 'message' => 'Failed', 'data' => []];

    public function product_add(Request $request)
{
    $response = $this->json_response;

    $validatedData = $request->validate([
        'seller_id' => 'required',
        'seller_name' => 'required',
        'product_name' => 'required',
        'category' => 'required',
        'sub_category' => 'required',
        'description' => 'required',
        'product_image' => 'required',
        'pre_order' => 'required',
        'amount' => 'required',
        'salesInfo' => 'required|array|min:1', // Ensure salesInfo is an array with at least one item
        'salesInfo.*.price' => 'required|numeric',
        'salesInfo.*.stock' => 'required|integer',
        'salesInfo.*.variation' => 'required',
        'shippingInfo' => 'required|array',
        'shippingInfo.weight' => 'required|numeric',
        'shippingInfo.parcel_size_z' => 'required|numeric',
        'shippingInfo.parcel_size_x' => 'required|numeric',
        'shippingInfo.parcel_size_y' => 'required|numeric',
        'shippingInfo.shipping_fee' => 'required',
    ]);

    $productinfo = new Products;
    $productinfo->seller_id = $validatedData['seller_id'];
    $productinfo->seller_name = $validatedData['seller_name'];
    $productinfo->product_name = $validatedData['product_name'];
    $productinfo->category = $validatedData['category'];
    $productinfo->sub_category = $validatedData['sub_category'];
    $productinfo->description = $validatedData['description'];
    $productinfo->product_image = json_encode($validatedData['product_image']);
    $productinfo->pre_order = $validatedData['pre_order'];
    $productinfo->displayAmount	 = $validatedData['displayAmount'];
    $productinfo->date_created = now();

    if (!$productinfo->save()) {
        $response['message'] = 'Error on adding product info. Contact your support.';
    } else {
        $productinfo_id = $productinfo->id;

        foreach ($validatedData['salesInfo'] as $item) {
            $salesInfo = new SalesInfo;
            $salesInfo->product_id = $productinfo_id;
            $salesInfo->price = $item['price'];
            $salesInfo->stock = $item['stock'];
            $salesInfo->variation = $item['variation'];
            $salesInfo->date_created = now();
            $salesInfo->save();
        }

        $shippingInfo = new ShippingInfo;
        $shippingInfo->product_id = $productinfo_id;
        $shippingInfo->weight = $validatedData['shippingInfo']['weight'];
        $shippingInfo->parcel_size_z = $validatedData['shippingInfo']['parcel_size_z'];
        $shippingInfo->parcel_size_x = $validatedData['shippingInfo']['parcel_size_x'];
        $shippingInfo->parcel_size_y = $validatedData['shippingInfo']['parcel_size_y'];
        $shippingInfo->shipping_fee = $validatedData['shippingInfo']['shipping_fee'];
        $shippingInfo->date_created = now();

        if (!$shippingInfo->save()) {
            $response['message'] = 'Error on adding shipping info. Contact your support.';
        } else {
            $response['message'] = 'Product Successfully Created!';
            $response['status'] = true;
        }
    }

    return response()->json($response);
}

public function product_edit(Request $request, $id)
{
    $response = $this->json_response;

    $validatedData = $request->validate([
        'seller_id' => 'required',
        'seller_name' => 'required',
        'product_name' => 'required',
        'category' => 'required',
        'sub_category' => 'required',
        'description' => 'required',
        'product_image' => 'required',
        'pre_order' => 'required',
        'amount' => 'required',
        'salesInfo' => 'required|array|min:1',
        'salesInfo.*.price' => 'required|numeric',
        'salesInfo.*.stock' => 'required|integer',
        'salesInfo.*.variation' => 'required',
        'shippingInfo' => 'required|array',
        'shippingInfo.weight' => 'required|numeric',
        'shippingInfo.parcel_size_z' => 'required|numeric',
        'shippingInfo.parcel_size_x' => 'required|numeric',
        'shippingInfo.parcel_size_y' => 'required|numeric',
        'shippingInfo.shipping_fee' => 'required',
    ]);

    // Find the product by ID
    $productinfo = Products::find($id);

    if (!$productinfo) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    // Update the product info
    $productinfo->seller_id = $validatedData['seller_id'];
    $productinfo->seller_name = $validatedData['seller_name'];
    $productinfo->product_name = $validatedData['product_name'];
    $productinfo->category = $validatedData['category'];
    $productinfo->sub_category = $validatedData['sub_category'];
    $productinfo->description = $validatedData['description'];
    $productinfo->product_image = json_encode($validatedData['product_image']);
    $productinfo->pre_order = $validatedData['pre_order'];
    $productinfo->displayamount = $validatedData['displayamount'];

    if (!$productinfo->save()) {
        $response['message'] = 'Error updating product info. Contact your support.';
    } else {
        // Update SalesInfo
        SalesInfo::where('product_id', $productinfo->id)->delete();
        foreach ($validatedData['salesInfo'] as $item) {
            $salesInfo = new SalesInfo;
            $salesInfo->product_id = $productinfo->id;
            $salesInfo->price = $item['price'];
            $salesInfo->stock = $item['stock'];
            $salesInfo->variation = $item['variation'];
            $salesInfo->date_created = now();
            $salesInfo->save();
        }

        // Update ShippingInfo
        ShippingInfo::where('product_id', $productinfo->id)->delete();
        $shippingInfo = new ShippingInfo;
        $shippingInfo->product_id = $productinfo->id;
        $shippingInfo->weight = $validatedData['shippingInfo']['weight'];
        $shippingInfo->parcel_size_z = $validatedData['shippingInfo']['parcel_size_z'];
        $shippingInfo->parcel_size_x = $validatedData['shippingInfo']['parcel_size_x'];
        $shippingInfo->parcel_size_y = $validatedData['shippingInfo']['parcel_size_y'];
        $shippingInfo->shipping_fee = $validatedData['shippingInfo']['shipping_fee'];
        $shippingInfo->date_created = now();

        if (!$shippingInfo->save()) {
            $response['message'] = 'Error updating shipping info. Contact your support.';
        } else {
            $response['message'] = 'Product Successfully Updated!';
            $response['status'] = true;
        }
    }

    return response()->json($response);
}

    public function addToCart(Request $request){
        $products = $request->all();
    
        $cart = Session::get('cart');
        $cart[$products['id']] = $product;
        Session::push('cart', $cart);
    
        return Response::json(['success' => true, 'cart_items' => Session::get('cart')]);
    }

   public function getAllProductsPerSeller() {


    $products = Products::with('salesInfo', 'shippingInfo')
    ->where('seller_id', 100) 
    ->get();

    return response()->json(['products' => $products]);
        
    }

    public function getAllProducts () {

    $products = Products::with('salesInfo', 'shippingInfo')->get();

    return response()->json(['products' => $products]);
        
    }
    
    public function getProductsbyID () {

        $products = Products::with('salesInfo', 'shippingInfo')
        ->where('id', 1)
        ->get();

    return response()->json(['products' => $products]);
        
    }
    
}
