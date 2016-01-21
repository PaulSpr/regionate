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

}