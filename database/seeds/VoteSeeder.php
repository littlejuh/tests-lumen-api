<?php
use App\Vote;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VoteSeeder extends Seeder
{

  public function run()
  {
    $faker = Faker::create();
    for($i=0; $i < 100; $i++){
      Vote::create([
        'participant_id' => $faker->randomElement([1, 2]),
        'campaign_id' => 2,
        'created_at' => $faker->dateTime($max = 'now'),
        'ip_address' => $faker->ipv4()
      ]);
    }
  }
}
