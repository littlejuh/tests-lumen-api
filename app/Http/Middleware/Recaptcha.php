<?php

namespace App\Http\Middleware;

  use Closure;
  use App\Response\Json\Traits\JsonResponseTrait;

class Recaptcha
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
    $data = array(
      'secret' => '6LfDNxkTAAAAAGgwin84GQdtgjMwh3Xg39cozuOu',
      'response' => $request->get('recaptcha')
    );
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $ch = curl_init($url);
    $postString = http_build_query($data, '', '&');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response);
    if(!$response->success){
      return $this->response()->invalidArgument([], ['message' => "RECAPTCHA_ERROR"]);
    }

    return $next($request);
  }
}




