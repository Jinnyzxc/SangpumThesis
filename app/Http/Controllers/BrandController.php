<?php

namespace App\Http\Controllers;
use App\Models\Brand; 

use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $json_response = ['status' => false, 'message' => 'Failed', 'data' => []];

    public function add (Request $request) {
        $response = $this->json_response;

        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;

        if (!$brand->save()) {
            $response['message'] = 'Error on adding. Contact your support.';
        } else {
            $response['message'] = 'Brand Successfully Created!';
            $response['status'] = true;
        }

        return response()->json($response);
    }
}
