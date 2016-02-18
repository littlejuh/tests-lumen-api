<?php

use Illuminate\Http\Response as IlluminateResponse;

class ParticipantsControllerTest extends TestCase
{


  public function teste()
  {


    $this->visit('/')
      ->see('alguma coisa escrita')
      ->assertStatusCode(200);


  }






  /**
   * A basic test example.
   *
   * @return void
   */

  /*public function testIfCanGetTheParticipantsList()
  {
   // dd('teste');
   /* $response = $this->call('GET', '/');

    $this->assertEquals(200, $response->status());*/

  /* $this->call('GET', 'http://api-bbb.localhost.com/v1/participants')
     ->seeJson([
       'status_code' => IlluminateResponse::HTTP_OK
     ]);*/
  //}
}
