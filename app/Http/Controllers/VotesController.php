<?php
namespace App\Http\Controllers;

use App\Campaign;
use App\Participant;
use App\Response\Json\Traits\JsonResponseTrait;
use App\Vote;
use Illuminate\Http\Request;

class VotesController extends Controller
{
  use JsonResponseTrait;

  public function store(Request $request)
  {
    $vote = new Vote();
    $data = array_merge($request->all(), ['ip_address' => $request->ip()]);

    if (!$vote->validate($data)) {
      return $this->response()->invalidArgument([], ['fields' => $vote->errorsMessage()]
      )->setStatusCode(400);
    }

    $campaign = Campaign::find($data['campaign_id']);
    $vote->campaign()->associate($campaign);
    $participant = Participant::find($data['participant_id']);
    $vote->participant()->associate($participant);
    $vote->ip_address = $request->ip();
    $vote->save();

    return $this->response()->success($participant->transformToArray());
  }


}