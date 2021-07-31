<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcTekController extends Controller
{
    public function evaluate(Request $request)
    {
        $expression = $request->get('expression');
        if (empty($expression)) {
            return response(['errors' => ['Empty expression']], 422);
        }

        try {
            $result = math_eval($expression, null);
            return [
                'expression' => $expression,
                'result' => $result
            ];
        } catch (\Exception $e) {
            return response([
                'expression' => $expression,
                'errors' => [$e->getMessage()]
            ], 422);
        }
    }
}
