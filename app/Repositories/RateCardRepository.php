<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

use App\Models\RateCard;

class RateCardRepository implements RepositoryInterface
{

    protected $ratecard;

	public function __construct(RateCard $ratecard){
		$this->ratecard = $ratecard;
	}

	public function save($datas){
        $this->ratecard->type = $datas['type'];
        $this->ratecard->save();
	}

	public function getById($id){
		return $this->ratecard->findOrFail($id);
	}

	public function getAll(){
		
		return $this->ratecard->all();
	}

	public function getByProvider($provider_id){
		return $this->ratecard->where('provider_id', '=', $provider_id)->get();
	}

}