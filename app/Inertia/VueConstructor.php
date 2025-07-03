<?php

namespace App\Inertia;

class VueConstructor
{
    public static function DynamicFormComponent()
    {
        $response = "this is api return";
        return response()->json([
            'response' => $response,
        ]);
    }
}