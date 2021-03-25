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
        $this->ratecard->name = $datas['name'];
        $this->ratecard->color = $datas['color'];
        $this->ratecard->save();
	}

	public function getById($id){
		return $this->ratecard->findOrFail($id);
	}

	public function getAll(){
		return null;
		//return $this->ratecard->all();
	}

	

	public function getByType($type){
		return $this->metier->where('type', '=', $type)->get();
	}

	public function getAllExcept($metier){
		return $this->metier->select('*')->where('name', '!=', $metier)->get();
	}

	public function getByName($name){
		return $this->metier->where('name', '=', $name)->first();
	}
	

}