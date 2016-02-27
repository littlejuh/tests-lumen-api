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

  protected $baseUrl = 'http://localhost';
  protected $version = 'v1';

  /**
   * Creates the application.
   *
   * @return Application
   */

  public function createApplication()
  {
    return require __DIR__ . '/../bootstrap/app.php';
  }

  protected function getResponseData($url, $method = 'GET')
  {
    $response = $this->call($method, '/' . $this->version . $url);
    return json_decode($response->getContent());
  }

  protected function postData($url, $args, $method = 'POST')
  {
    $response = $this->call($method, '/' . $this->version . $url, $args);
    return json_decode($response->getContent());
  }

}