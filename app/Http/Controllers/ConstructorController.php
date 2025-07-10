<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConstructorController extends Controller
{
    public function DynamicFormComponent()
    {
        $response = "this is api return";
        return response()->json([
            'response' => $response,
        ]);
    }
}