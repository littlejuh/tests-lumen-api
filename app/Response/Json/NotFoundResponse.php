<?php

namespace App\Response\Json;

use Illuminate\Http\Response as IlluminateResponse;

class NotFoundResponse extends AbstractResponse
{
    protected $statusCode = IlluminateResponse::HTTP_NOT_FOUND;
}