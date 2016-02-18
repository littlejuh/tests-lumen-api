<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignParticipantTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('campaign_participant', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('campaign_id')->unsigned();
      $table->integer('participant_id')->unsigned();

      $table->foreign('participant_id')->references('id')->on('participants');
      $table->foreign('campaign_id')->references('id')->on('campaigns');

    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('campaign_participant', function (Blueprint $table) {
      Schema::drop('campaign_participant');
    });
  }
}
