<?php

namespace App\Response\Json;

use Illuminate\Http\Response as IlluminateResponse;

class InvalidArgumentResponse extends AbstractResponse
{
  protected $statusCode = IlluminateResponse::HTTP_BAD_REQUEST;
}