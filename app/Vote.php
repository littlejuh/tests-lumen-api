<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public $timestamps = false;

    /**
     * Get the vote that owns the candidate.
     */
    public function candidate()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * Get the vote that owns the campaign.
     */
    public function campaign()
    {
        return $this->belongsTo('App\Post');
    }

}
