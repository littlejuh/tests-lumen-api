<?php
namespace App\Http\Controllers;

use App\Response\Json\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class VotesController extends Controller
{
  use JsonResponseTrait;

  public function store(Request $request)
  {
    dd('aqui eu salvo o voto do cara.');
  }
}