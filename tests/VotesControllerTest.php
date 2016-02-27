<?php

namespace App\Tests;

use Laravel\Lumen\Testing\DatabaseTransactions as DatabaseTransactions;
use App\Participant;
use \App\Campaign;

class VotesControllerTest extends TestCase
{
  use DatabaseTransactions;
  
  public function testIfCanCreateAVote()
  {
    $this->post($this->version.'/votes', ['campaign_id' => 1, 'participant_id' => 1])
      ->seeJson(["id" => 1])
      ->assertResponseOk();
      
  }
  public function testIfCanCreateAVoteWithInvalidArguments()
  {
    $this->post($this->version.'/votes', ['participant_id' => 1])
      ->seeJson(["message" => "INVALID_ARGUMENT"])
      ->seeJson(["statusCode" => 400])
      ->assertResponseStatus(400);
  }
}
