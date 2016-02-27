<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Campaign extends Model
{
  public $timestamps = false;

  public function transformToArray()
  {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'start_at' => $this->start_at,
      'end_at' => $this->end_at
    ];
  }

  /**
   * The participants that belong to the campaign.
   */
  public function participants()
  {
    return $this->belongsToMany('App\Participant');
  }

  /**
   * Get count all votes.
   */
  public function totalVotes()
  {
    $query = Campaign::query();
    $query->select([DB::raw("count(votes.id) as total_votes")]);
    $query->join('votes', 'votes.campaign_id', '=', 'campaigns.id');
    $query->where('campaign_id', '=', $this->id);
    return $query->first()->total_votes;
  }

  /**
   * Get total votes per hour that belong to the campaign.
   */
  public function totalVotesPerHour()
  {
    $query = Campaign::query();
    $query->select([DB::raw("DATE_FORMAT(votes.created_at, '%d-%m-%Y') as days, DATE_FORMAT(created_at, '%H') as hour"),
      DB::raw("count(votes.id) as total_votes")]);
    $query->join('votes', 'votes.campaign_id', '=', 'campaigns.id');
    $query->where('campaign_id', '=', $this->id);
    $query->orderBy('days', 'ASC');
    $query->orderBy('hour', 'ASC');
    $query->groupBy('days');
    $query->groupBy('hour');
    
    return $query->get()->toArray();
  }

  /**
   * Get total votes per participant that belong to the campaign.
   */
  public function totalVotesPerParticipant()
  {
    $query = Campaign::query();
    $query->select(['votes.participant_id', 'participants.name', DB::raw("count(votes.id) as total_votes"),
      DB::raw("concat( round((count(*) / (select count(*) from votes where campaign_id=" . $this->id . ")) * 100) , '%') AS 'percent_votes'")]);
    $query->join('votes', 'votes.campaign_id', '=', 'campaigns.id');
    $query->join('participants', 'participants.id', '=', 'votes.participant_id');
    $query->where('campaign_id', '=', $this->id);
    $query->orderBy('votes.participant_id', 'ASC');
    $query->groupBy('votes.participant_id');
    return $query->get()->toArray();
  }

}
