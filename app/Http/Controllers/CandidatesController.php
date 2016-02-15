<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Response\Json\Traits\JsonResponseTrait;

class CandidatesController extends Controller
{
    use JsonResponseTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     * GET /courses
     *
     * @return Response
     */
    public function index()
    {
       // dd(Candidate::all()->toArray());
        return $this->response()->success(Candidate::all()->toArray());

        return Candidate::all();
        dd('teste');
    }

}
