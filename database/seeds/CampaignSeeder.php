<?php
use App\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{

  public function run()
  {
    $campaign1 = Campaign::create([
      'name' => 'Paredão Semana 2',
      'start_at' => '2016-02-24 23:02:00',
      'end_at' => '2016-03-02 23:02:00',
      'is_active' => 1
    ]);

    $campaign2 = Campaign::create([
      'name' => 'Paredão Semana 1',
      'start_at' => '2016-02-17 23:02:00',
      'end_at' => '2016-02-23 23:02:00',
      'is_active' => 0
    ]);

    $campaign1->participants()->attach(1);
    $campaign1->participants()->attach(2);

    $campaign2->participants()->attach(1);
    $campaign2->participants()->attach(3);

  }
}
