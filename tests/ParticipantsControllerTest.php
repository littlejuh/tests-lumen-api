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

  private function setUpParticipantsInCampaign()
  {
    $participant = new Participant();
    $participant->name = 'Participante 1';
    $participant->save();
    $campaign = new Campaign();
    $campaign->is_active = true;
    $campaign->end_at = Carbon::now()->addDay(5);
    $campaign->save();
    $campaign->participants()->attach($participant);
  }

  public function testIfCanGetAListOfParticipants()
  {
    $this->setUpParticipantsInCampaign();
    $data = $this->getResponseData('/campaigns/active/participants');

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
