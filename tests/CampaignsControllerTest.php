<?php

namespace App\Tests;

use Laravel\Lumen\Testing\DatabaseTransactions as DatabaseTransactions;
use App\Participant;
use \App\Campaign;

class CampaignsControllerTest extends TestCase
{
  use DatabaseTransactions;
  
  public function testIfCanGetAListOfCampaigns()
  {
   $this->get($this->version.'/campaigns')
    ->seeJson(['name' => 'Paredão Semana 1'])
      ->assertResponseOk();
  }
  
 public function testIfCantGetAListOfCampaignsWhenThereIsNone()
  {
    $this->artisan('migrate:refresh');
    $this->get($this->version.'/campaigns')
      ->seeJson(["statusCode" => 404])
      ->assertResponseStatus(404);
  }
  
  public function testIfCanShowACampaignById(){
       $this->get($this->version.'/campaigns/1')
      ->seeJson(["id" => 1])
       ->assertResponseOk();
  }
  
  public function testIfCantShowACampaignByIdWhenIdDoesNotExist(){
      $this->artisan('migrate:refresh');
       $this->get($this->version.'/campaigns/1')
       ->seeJson(["statusCode" => 404])
       ->assertResponseStatus(404);
  }
  
  public function testIfCanGetParticipantStatsByCampaignId(){
      $this->get($this->version.'/campaigns/1/participants/details')
      ->seeJson(["id" => 1])
      ->assertResponseOk();
  }
  
   public function testIfCantGetParticipantStatsByCampaignIdWhenDoesNotExist(){
      $this->artisan('migrate:refresh');
       $this->get($this->version.'/campaigns/1/participants/details')
       ->seeJson(["statusCode" => 404])
       ->assertResponseStatus(404);
  }
}
