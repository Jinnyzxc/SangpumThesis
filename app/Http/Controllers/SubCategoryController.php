<?php

namespace App\Http\Controllers;
use App\Models\SubCategory; 

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $json_response = ['status' => false, 'message' => 'Failed', 'data' => []];

    public function add (Request $request) {
        $response = $this->json_response;

        $sub_category = new SubCategory;
        $sub_category->sub_categoryname = $request->sub_categoryname;
        $sub_category->sub_categorydescription = $request->sub_categorydescription;
        $sub_category->parent_category = $request->parent_category;

        if (!$sub_category->save()) {
            $response['message'] = 'Error on adding. Contact your support.';
        } else {
            $response['message'] = 'SubCategory Successfully Created!';
            $response['status'] = true;
        }

        return response()->json($response);
    }
}
