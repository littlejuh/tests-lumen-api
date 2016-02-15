<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public $timestamps = false;


    /**
     * The candidates that belong to the campaign.
     */
    public function candidates()
    {
        return $this->belongsToMany('App\Candidate');
    }

}
