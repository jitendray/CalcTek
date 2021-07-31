<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcTekController extends Controller
{
    public function evaluate(Request $request)
    {
        $expression = $request->get('expression');
        if(empty($expression)) {
            return response(['errors' => ['Empty expression']], 422);
        }

        return math_eval($expression, null);
    }
}
