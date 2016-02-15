<?php

namespace App\Response\Json\Traits;

use App\Response\Json\Contracts\Factory;

trait JsonResponseTrait
{
    /**
     * @return Factory
     */
    protected function response()
    {
        return app(Factory::class);
    }
}