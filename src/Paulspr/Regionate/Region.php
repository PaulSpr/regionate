<?php

namespace Paulspr\Regionate;

class Region{
	public
		$localName,
		$thousandsSeperator,
		$decimalPoint,
		$currency,
		$currencyValue,
		$dateCompact,
		$dateShort,
		$dateNormal,
		$dateLong,
		$dateFull;

	public function __construct( $localName )
	{
		$this->localName = $localName;
	}
}
