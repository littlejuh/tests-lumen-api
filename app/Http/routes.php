<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$app->group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers'], function ($app) {
  $app->post('votes', ['uses' => 'VotesController@store', 'middleware' => 'recaptcha']);
  $app->get('campaigns/active/participants', ['uses' => 'ParticipantsController@index']);
  $app->get('campaigns', ['uses' => 'CampaignController@index']);
  $app->get('campaigns/{id}', ['uses' => 'CampaignController@show']);
  $app->get('campaigns/{id}/participants/details', ['uses' => 'CampaignController@statsParticipants']);
});
