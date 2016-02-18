<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Response\Json\Traits\JsonResponseTrait;
use App\Bbb\Transformers\ParticipantTransformer;
use Carbon\Carbon;

class ParticipantsController extends Controller
{
  use JsonResponseTrait;

  protected $participantTransformer;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(ParticipantTransformer $participantTransformer)
  {
    $this->participantTransformer = $participantTransformer;
  }

  /**
   * Display a listing of the resource.
   * GET /courses
   *
   * @return Response
   */
  public function index()
  {
    $campaign = Campaign::where('is_active', '=', true)
      ->where('end_at', '>', Carbon::now())->first();
    $participants = $campaign->participants()->get();

    if (empty($participants->fields)) {
      return $this->response()->notFound(['participants' => []]);
    }
    return $this->response()->success(['participants' => $this->participantTransformer
        ->transformCollection($participants)]
    );
  }

}
