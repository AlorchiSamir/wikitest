<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

use App\Models\Provider;

class ProviderRepository implements RepositoryInterface
{

    protected $provider;

	public function __construct(Provider $provider){
		$this->provider = $provider;
	}

	public function save($datas){
        $this->provider->type = $datas['type'];
        $this->provider->save();
	}

	public function getById($id){
		return $this->provider->findOrFail($id);
	}

	public function getAll(){
		
		return $this->provider->all();
	}

	public function getDistribution(){
		
	}

}