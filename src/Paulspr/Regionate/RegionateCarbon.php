<?php
namespace Paulspr\Regionate;

use Carbon\Carbon;

class RegionateCarbon extends Carbon{

	public function compact(){
		 return Regionate::dateCompact($this->toDateTimeString());
	}

	public function short(){
		return Regionate::dateShort($this->toDateTimeString());
	}

	public function normal(){
		return Regionate::dateNormal($this->toDateTimeString());
	}

	public function long(){
		return Regionate::dateLong($this->toDateTimeString());
	}

	public function full(){
		return Regionate::dateFull($this->toDateTimeString());
	}


	public function shortTime(){
		return Regionate::timeShort($this->toDateTimeString());
	}

	public function longTime(){
		return Regionate::timeLong($this->toDateTimeString());
	}


	public function compactDateTime(){
		return Regionate::dateTimeCompact($this->toDateTimeString());
	}

	public function shortDateTime(){
		return Regionate::dateTimeShort($this->toDateTimeString());
	}

	public function normalDateTime(){
		return Regionate::dateTimeNormal($this->toDateTimeString());
	}

	public function longDateTime(){
		return Regionate::dateTimeLong($this->toDateTimeString());
	}

	public function fullDateTime(){
		return Regionate::dateTimeFull($this->toDateTimeString());
	}

}