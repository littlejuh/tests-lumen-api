<?php

namespace App\Tests;

use Laravel\Lumen\Application;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\DatabaseMigrations;
use App\Tests\Traits\DatabaseSeeds;

class TestCase extends \Laravel\Lumen\Testing\TestCase
{
  use DatabaseTransactions, DatabaseMigrations, DatabaseSeeds;

  /**
   * The base URL to use while testing the application.
   *
   * @var string
   */

  protected $version = 'v1';


  public function setUp()
  {
    parent::setUp();
    $this->app->instance('middleware.disable', true);
  }

  /**
   * Creates the application.
   *
   * @return Application
   */

  public function createApplication()
  {
    return require __DIR__ . '/../bootstrap/app.php';
  }
}