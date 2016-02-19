<?php
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\DatabaseMigrations;
class TestCase extends Laravel\Lumen\Testing\TestCase
{
use DatabaseTransactions, DatabaseMigrations;

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
   * @return \Illuminate\Foundation\Application
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

  protected function getData($url)
  {
    return $this->getData('/' . $this->version . '/' . $url);
  }

}