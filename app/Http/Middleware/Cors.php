<?php

namespace App\Http\Middleware;

use Closure;
use App\Response\Json\Traits\JsonResponseTrait;

class Cors
{
  use JsonResponseTrait;

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
      header('Access-Control-Allow-Headers: Content-Type, Origin, Authorization');

      $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, Origin, Authorization'
      ];

      if ($request->isMethod('OPTIONS')) {

        return $this->response()->success($headers);
      }
      $response = $next($request);
      foreach ($headers as $key => $value) {
        $response->header($key, $value);
      }

      return $response;

      return $next($request);

  }
}