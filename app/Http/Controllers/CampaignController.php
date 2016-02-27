<?php
namespace App\Http\Controllers;


use App\Response\Json\Traits\JsonResponseTrait;
use App\Campaign;

class CampaignController
{
  use JsonResponseTrait;

  /**
   * Return all campaigns
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $campaigns = Campaign::orderBy('start_at', 'DESC')->get();
    if($campaigns->isEmpty()){
       return $this->response()->notFound(['campaigns' => []])->setStatusCode(404);
    }
    $transform = $campaigns->map(function ($campaign) {
      return $campaign->transformToArray(($campaign));
    });
    
    return $this->response()->success(['campaigns' => $transform]);
  }

  /**
   * Show a campaign by id
   *
   * @param  int
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $campaign = Campaign::FindOrFail($id);
  
    $transform = array_merge(
      $campaign->transformToArray(),
      [
        'total_votes' => $campaign->totalVotes(),
        'total_votes_per_hour' => $campaign->totalVotesPerHour(),
        'total_votes_per_participants' => $campaign->totalVotesPerParticipant(),
      ]
    );
    return $this->response()->success(['campaign' => $transform]
    );
  }

  /**
   * Show a campaign with status participants
   *
   * @param  int
   * @return \Illuminate\Http\Response
   */
  public function statsParticipants($id)
  {
    $campaign = Campaign::FindOrFail($id);

    $transform = array_merge(
      $campaign->transformToArray(),
      [
        'total_votes_per_participants' => $campaign->totalVotesPerParticipant(),
      ]
    );
    return $this->response()->success(['campaign' => $transform]
    );
  }
}