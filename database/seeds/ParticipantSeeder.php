<?php
use App\Participant;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{

  public function run()
  {
    Participant::create([
      'name' => 'Participante 1'
    ]);
    Participant::create([
      'name' => 'Participante 2'
    ]);
    Participant::create([
      'name' => 'Participante 3'
    ]);
  }
}
