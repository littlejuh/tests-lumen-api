<?php
use App\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{

  public function run()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('campaigns')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    $campaign = Campaign::create([
      'name' => 'Paredão Semana 1',
      'start_at' => '2016-02-17 23:02:00',
      'end_at' => '2016-03-02 23:02:00',
      'is_active' => 1
    ]);

    $campaign->participants()->attach(1);
    $campaign->participants()->attach(2);


  }
}
