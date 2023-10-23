<?php

namespace App\Http\Controllers;
use App\Models\Category; 

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $json_response = ['status' => false, 'message' => 'Failed', 'data' => []];

    public function add (Request $request) {
        $response = $this->json_response;

        $category = new Category;
        $category->categoryname = $request->categoryname;
        $category->categorydescription = $request->categorydescription;

        if (!$category->save()) {
            $response['message'] = 'Error on adding. Contact your support.';
        } else {
            $response['message'] = 'Category Successfully Created!';
            $response['status'] = true;
        }

        return response()->json($response);
    }
}
