<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RateCard;

use App\Repositories\RateCardRepository;

use Session;

class RateCardController extends Controller
{
    public function index($provider, RateCardRepository $ratecardRepository){  

        $provider_id = $provider;
        $ratecards = $ratecardRepository->getByProvider($provider_id);
        $values['day_schedule'] = (!is_null(Session::get('day_schedule'))) ? Session::get('day_schedule') : '0';
        $values['night_schedule'] = (!is_null(Session::get('night_schedule'))) ? Session::get('night_schedule') : '0';
        $values['ratecard'] = (!is_null(Session::get('ratecard'))) ? Session::get('ratecard') : '0';
        return view('ratecards.index', compact('ratecards', 'values'));
    }

    public function Ajaxlist(RateCardRepository $ratecardRepository){
    	
    	$provider_id = $_POST['provider'];
    	$ratecards = $ratecardRepository->getByProvider($provider_id);
    	$values['day_schedule'] = (!is_null(Session::get('day_schedule'))) ? Session::get('day_schedule') : '0';
    	$values['night_schedule'] = (!is_null(Session::get('night_schedule'))) ? Session::get('night_schedule') : '0';
        $values['ratecard'] = (!is_null(Session::get('ratecard'))) ? Session::get('ratecard') : '0';
        return view('ratecards.form', compact('ratecards', 'values'));
    }

    public function submit(Request $request, RateCardRepository $ratecardRepository){

    	$submit['day_schedule'] = ltrim($request->day_schedule, 0);
        $submit['night_schedule'] = ltrim($request->night_schedule, 0);

    	Session::put('day_schedule', $submit['day_schedule']);
    	Session::put('night_schedule', $submit['night_schedule']);
        Session::put('ratecard', $request->ratecard);


    	$ratecard = $ratecardRepository->getById($request->ratecard);
    	$results = $ratecard->bischeduleCalcul($request->day_schedule, $request->night_schedule);
        
    	//$result['']

        return view('ratecards.submit', compact('submit', 'results', 'ratecard'));
    }
}
