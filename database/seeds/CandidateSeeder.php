<?php
use App\Candidate;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('candidates')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Candidate::create([
            'name' => 'Participante 1'
        ]);
        Candidate::create([
            'name' => 'Participante 2'
        ]);

    }
}
