<?php

namespace App;

class Vote extends ApiModel
{
  protected $rules = [
    'participant_id' => ['required', 'exists:participants,id'],
    'campaign_id' => ['required', 'exists:campaigns,id'],
    'ip_address' => ['required']
  ];

  public $timestamps = false;

  /**
   * Get the vote that owns the participant.
   */
  public function participant()
  {
    return $this->belongsTo('App\Participant');
  }

  /**
   * Get the vote that owns the campaign.
   */
  public function campaign()
  {
    return $this->belongsTo('App\Campaign');
  }

}
