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
		$nl->dateCompact			= '%e-%-m-%y';
		$nl->dateShort				= '%e-%-m-%Y';
		$nl->dateNormal				= '%e %b %Y';
		$nl->dateLong				= '%e %B %Y';
		$nl->dateFull				= '%A %e %B %Y';

		Regionate::addRegion('nl', $nl);

		// us region
		$us = new Region('us');
		$us->decimalPoint			= '.';
		$us->thousandsSeperator		= ',';
		$us->currency				= '$';
		$us->currencyValue			= 1;
		$us->dateCompact			= '%-m.%e.%y';
		$us->dateShort				= '%-m.%e.%Y';
		$us->dateNormal				= '%b %e %Y';
		$us->dateLong				= '%B %e %Y';
		$us->dateFull				= '%A %B %e %Y';


		Regionate::addRegion('us', $us);

		$defaultRegion = config('app.region') ? config('app.region') : config('app.fallback_region');
		Regionate::setRegion($defaultRegion);

		RegionateCarbon::setLocale(config('app.locale'));
	}
}