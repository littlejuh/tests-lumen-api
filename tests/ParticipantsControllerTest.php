<?php
use Illuminate\Http\Response as IlluminateResponse;
use Laravel\Lumen\Testing\DatabaseTransactions as DatabaseTransactions;
use App\Participant;
use \App\Campaign;

class ParticipantsControllerTest extends TestCase
{
  use DatabaseTransactions;

  public function testIfCanGetAListOfCourses()
  {
    $participant = new Participant();
    $participant->name = 'Participante 1';
    $participant->save();
    $campaign = new Campaign();
    $campaign->participants()->attach($participant->id);
    dd($campaign);
    $data = $this->getResponseData('/participants');
  }

  public function testIfCanSeeStatusCodeCorrectlyParticipantsList()
  {

    /*$data = $this->getResponseData('api/courses');
    $this->assertArrayHasKey('courses', $data->first());*/
  }

  public function testIfCantGetAListOfParticipantsWhenThereIsNone()
  {
    $data = $this->getResponseData('/participants');
    $this->assertEquals(IlluminateResponse::HTTP_NOT_FOUND, $data->statusCode);
  }

  public function testIfCanSeeStatusCodeCorrectlyWhenParticipantsNotFound()
  {

    $data = $this->getResponseData('/participants');
    $this->assertEmpty($data->data->participants);
  }

}
