<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RateCard;

use App\Http\Resources\RateCard as RateCardResource;

use App\Repositories\RateCardRepository;

class RateCardController extends Controller
{
    /**
     * Affiche une estimation de la consommation.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $day, $night, RateCardRepository $ratecardRepository){
        $datas = array();

        $ratecard = $ratecardRepository->getById($id);
        $datas['ratecard']['provider'] = $ratecard->provider->name;
        $datas['ratecard']['name'] = $ratecard->name;
        $datas['consumption']['day'] = $day;
        $datas['consumption']['night'] = $night;
        $datas['bill'] = $ratecard->bischeduleCalcul($day, $night);

        return new RateCardResource($datas);
    }

}
