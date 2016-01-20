<?php

namespace Paulspr\Regionate;

use Illuminate\Support\ServiceProvider;

class RegionateServiceProvider extends ServiceProvider
{
	/**
	* Register bindings in the container.
	*
	* @return void
	*/
	public function register()
	{
		// create default regions

		// nl region
		$nl = new Region('nl');
		$nl->decimalPoint			= ',';
		$nl->thousandsSeperator		= '.';
		$nl->currency				= '&euro;';
		$nl->currencyValue			= 1.09125;
		$nl->dateCompact			= 'j-n-y';
		$nl->dateShort				= 'j-n-Y';
		$nl->dateNormal				= 'j M Y';
		$nl->dateLong				= 'j F Y';
		$nl->dateFull				= 'l j F Y';

		Regionate::addRegion('nl', $nl);

		// us region
		$us = new Region('us');
		$us->decimalPoint			= '.';
		$us->thousandsSeperator		= ',';
		$us->currency				= '$';
		$us->currencyValue			= 1;
		$us->dateCompact			= 'n.j.y';
		$us->dateShort				= 'n.j.Y';
		$us->dateNormal				= 'M j Y';
		$us->dateLong				= 'F j Y';
		$us->dateFull				= 'l F j Y';


		Regionate::addRegion('us', $us);

		$defaultRegion = config('app.region') ? config('app.region') : config('app.fallback_region');
		Regionate::setRegion($defaultRegion);
	}
}