<?php

class TestCase extends Laravel\Lumen\Testing\TestCase
{


  /**
   * The base URL to use while testing the application.
   *
   * @var string
   */

  protected $baseUrl = 'http://localhost';

  /**
   * Creates the application.
   *
   * @return \Illuminate\Foundation\Application
   */

  public function createApplication()

  {
    return require __DIR__ . '/../bootstrap/app.php';
  }


}