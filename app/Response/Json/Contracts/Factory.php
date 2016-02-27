<?php

namespace App\Response\Json\Contracts;

use App\Response\Json\NotFoundResponse;
use App\Response\Json\SuccessResponse;
use App\Response\Json\InternalErrorResponse;

interface Factory
{

  /**
   * @param array $data
   * @param array $meta
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function success(array $data, array $meta = []);

  /**
   * @param array $data
   * @param array $meta
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function notFound(array $data, array $meta = []);

  /**
   * @param array $data
   * @param array $meta
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function invalidArgument(array $data, array $meta = []);


  /**
   * @param array $data
   * @param array $meta
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function internalError(array $data, array $meta = []);
}