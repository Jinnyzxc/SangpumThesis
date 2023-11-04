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



/*

namespace App\Http\Controllers;
use App\Models\Orderedproduct;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Inventory;
use Illuminate\Http\Request;

class OrderedproductController extends Controller
{
    private $json_response = ['status' => false, 'message' => 'Failed', 'data' => []];

    public function ordered(Request $request)
    {
        $response = $this->json_response;

        // ...

        $orderedproduct = new Orderedproduct;
        $orderedproduct->Order_id = $request->Order_id;
        $orderedproduct->Product_id = $request->Product_id;
        $orderedproduct->date_created = now();

        if (!$orderedproduct->save()) {
            $response['message'] = 'Error on adding. Contact your support.';
        } else {
            // After successfully adding the product to the order,
            // create an order item and update the inventory.
            $this->createOrderItemAndUpdateInventory($request->Order_id, $request->Product_id);
            $response['message'] = 'Order Successfully Created!';
            $response['status'] = true;
        }

        return response()->json($response);
    }

    private function createOrderItemAndUpdateInventory($order_id, $product_id)
    {
        // Create an order item associated with the order
        $orderItem = new OrderItem;
        $orderItem->order_id = $order_id;
        $orderItem->product_id = $product_id;
        $orderItem->save();

        // Update the inventory by subtracting the quantity of the ordered product
        // Please replace 'quantityOrdered' with the actual field representing the quantity ordered.
        $orderedProduct = Orderedproduct::where('Order_id', $order_id)->where('Product_id', $product_id)->first();
        $inventory = Inventory::where('product_id', $product_id)->first();

        if ($inventory && $orderedProduct) {
            $inventory->quantity -= $orderedProduct->quantityOrdered;
            $inventory->save();
        }
    }
}


*/