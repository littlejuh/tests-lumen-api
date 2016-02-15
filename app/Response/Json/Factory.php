<?php

namespace App\Response\Json;

use App\Response\Json\Contracts\Response;
use App\Response\Json\Contracts\Factory as FactoryContract;

class Factory implements FactoryContract
{
    /**
     * @param array $data
     * @param array $meta
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function success(array $data, array $meta = [])
    {
        return (new SuccessResponse($data, $meta))->make();
    }

    /**
     * @param array $data
     * @param array $meta
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function notFound(array $data, array $meta = [])
    {
        array_set($meta, 'error.message', Response::NOT_FOUND);

        return (new NotFoundResponse($data, $meta))->make();
    }

    /**
     * @param array $data
     * @param array $meta
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function internalError(array $data, array $meta = [])
    {
        array_set($meta, 'error.message', Response::INTERNAL_ERROR);

        return (new InternalErrorResponse($data, $meta))->make();
    }
}