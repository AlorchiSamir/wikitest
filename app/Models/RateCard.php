<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RateCard extends Model{

	protected $table = 'ratecard';

	public function distribution(){
        return $this->belongsTo('App\Models\Distribution');
    }

    public function provider(){
        return $this->belongsTo('App\Models\Provider');
    }

	public function bischeduleCalcul($day, $night){
		
		$distribution = $this->distribution;

		$results = array();
		$results['day'] = $day * ($this->day_schedule + $distribution->day_schedule);
		$results['night'] = $night * ($this->night_schedule + $distribution->night_schedule);
		$results['total'] = $results['day'] + $results['night'];

		return $results;
	}
   
}