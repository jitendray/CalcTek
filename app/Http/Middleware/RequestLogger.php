<?php

namespace App\Http\Middleware;

use App\Models\RequestLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RequestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function terminate($request, $response)
    {
        $route = Route::current();
        $model = new RequestLog();
        $model->uri     =   $route->uri();
        $model->name    =   $route->getName();
        $model->action  =   $route->getActionName();
        $model->method  =   $route->getActionMethod();
        $model->request =   json_encode($request->all());
        $model->response=   $response->getContent();
        $model->status_code =   $response->getStatusCode();
        $model->save();
    }
}
