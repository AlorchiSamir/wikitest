<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RateCard;

use App\Repositories\RateCardRepository;

class RateCardController extends Controller
{
    public function index(RateCardRepository $ratecardRepository){       
        //$ratecards = $ratecardRepository->getAll();
        $ratecards = RateCard::all();
        return view('ratecards.index', compact('ratecards'));
    }
}
