<?php

namespace App\Response\Json;
use Illuminate\Http\Response as IlluminateResponse;

class InternalErrorResponse extends AbstractResponse
{
    protected $statusCode = IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR;
}