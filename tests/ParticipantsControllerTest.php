<?php

namespace App\Tests;

use Illuminate\Http\Response as IlluminateResponse;
use Laravel\Lumen\Testing\DatabaseTransactions as DatabaseTransactions;
use App\Participant;
use \App\Campaign;
use Carbon\Carbon;


class ParticipantsControllerTest extends TestCase
{
  use DatabaseTransactions;

  public function testIfCanGetAListOfParticipants()
  {
    $this->setUpParticipantsInCampaign();
    $data = $this->getResponseData('/campaigns/active/participants');
    dd($data);
    $this->assertEquals($data->data->participants[0]->name, 'Participante 1');
  }

  public function testIfCanSeeStatusCodeCorrectlyInParticipantsList()
  {
    $this->setUpParticipantsInCampaign();
    $data = $this->getResponseData('/campaigns/active/participants');
    $this->assertEquals(IlluminateResponse::HTTP_OK, $data->statusCode);
  }

  public function testIfCantGetAListOfParticipantsWhenThereIsNone()
  {
    $data = $this->getResponseData('/campaigns/active/participants');
    $this->assertEmpty($data->data->participants);
  }

  public function testIfCanSeeStatusCodeCorrectlyWhenParticipantsNotFound()
  {
    $data = $this->getResponseData('/campaigns/active/participants');
    $this->assertEquals(IlluminateResponse::HTTP_NOT_FOUND, $data->statusCode);
  }

}
