<?php
use App\Participant;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('participants')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Participant::create([
            'name' => 'Participante 1'
        ]);
        Participant::create([
            'name' => 'Participante 2'
        ]);

    }
}
