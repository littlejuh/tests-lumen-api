<?php
namespace App\Bbb\Transformers;
class ParticipantTransformer extends Transformer
{

  /**
   * Transform a participant
   *
   * @param $participant
   * @return array
   */
  public function transform($participant)
  {
    return [
      'id' => $participant->id,
      'name' => $participant->name
    ];
  }


}