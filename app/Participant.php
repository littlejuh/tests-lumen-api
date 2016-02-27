<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
  public $timestamps = false;

  public function transformToArray()
  {
    return [
      'id' => $this->id,
      'name' => $this->name
    ];
  }
}
