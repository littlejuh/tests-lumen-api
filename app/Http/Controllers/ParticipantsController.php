<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Response\Json\Traits\JsonResponseTrait;
use Carbon\Carbon;

class ParticipantsController extends Controller
{
  use JsonResponseTrait;

  /**
   * List of participants for the active campaign is not over yet.
   * GET /participants
   *
   * @return Response
   */
  public function index()
  {
    $campaign = Campaign::where('is_active', '=', true)
      ->where('end_at', '>', Carbon::now())->first();

    if (is_null($campaign)) {
      return $this->response()->notFound(['participants' => []])->setStatusCode(404);
    }
    $participants = $campaign->participants()->get();
    $transform = $participants->map(function ($participant) {
      return $participant->transformToArray(($participant));
    });
    return $this->response()->success(['participants' => $transform]
    );
  }


}
