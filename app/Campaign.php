<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public $timestamps = false;


    /**
     * The participants that belong to the campaign.
     */
    public function participants()
    {
        return $this->belongsToMany('App\Participant');
    }

}
