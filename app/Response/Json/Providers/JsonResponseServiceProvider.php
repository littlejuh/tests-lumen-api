<?php

namespace App\Response\Json\Providers;

use Illuminate\Support\ServiceProvider;
use App\Response\Json\Contracts\Factory as FactoryContract;
use App\Response\Json\Factory;

class JsonResponseServiceProvider extends ServiceProvider
{

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->singleton(FactoryContract::class, Factory::class);
  }
}