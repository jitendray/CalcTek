<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalcTekRequestResource;
use App\Models\RequestLog;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    const CALC_TEK_EVALUATOR_ROUTE_NAME = 'calc_tek_evaluator';

    public function index(Request $request)
    {
        $requestLogs = RequestLog::where('name', self::CALC_TEK_EVALUATOR_ROUTE_NAME)->get(['id', 'response']);
        return CalcTekRequestResource::collection($requestLogs);
    }
}
