<?php

namespace App\Tests;

use Laravel\Lumen\Testing\DatabaseTransactions as DatabaseTransactions;
use App\Participant;
use \App\Campaign;

class ParticipantsControllerTest extends TestCase
{
  use DatabaseTransactions;
  
 
  public function testIfCanGetAListOfParticipants()
  {
    $this->get($this->version.'/campaigns/active/participants')
      ->seeJson(['name'=> 'Participante 1'])
      ->assertResponseOk();
  }

  public function testIfCantGetAListOfParticipantsWhenThereIsNone()
  {
    $this->artisan('migrate:refresh');
    $this->get($this->version.'/campaigns/active/participants')
      ->seeJson(["statusCode" => 404])
      ->assertResponseStatus(404);
  }
}
