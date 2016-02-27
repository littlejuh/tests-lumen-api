<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ApiModel extends Model
{
  protected $rules;
  protected $validator;
  protected $messages = [
    'required' => 'REQUIRED',
    'date_format' => 'INVALID_FORMAT'
  ];

  public function validate($request)
  {
    $this->validator = Validator::make($request, $this->rules, $this->messages);
    if ($this->validator->fails()) {
      return false;
    } else {
      return true;
    }
  }

  public function errorsMessage()
  {
    return $this->validator->messages()->getMessages();
  }


}