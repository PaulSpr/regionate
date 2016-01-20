<?php

namespace Paulspr\Regionate;

class Region{
	public
		$localName,
		$thousandsSeperator,
		$decimalPoint;

	public function __construct( $localName )
	{
		$this->localName = $localName;
	}
}
