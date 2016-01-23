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

		$locale = config('app.locale').'_'.config('app.region');
		$localeResult = setlocale(LC_TIME, $locale);
		if( !$localeResult ){
			// throw incorrect locale exception?
			// we could try again
		}


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
		$nl->timeShort				= '%k:%M';
		$nl->timeLong				= '%k:%M:%S';

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
		$us->timeShort				= '%l:%M %p';
		$us->timeLong				= '%l:%M:%S %p';


		Regionate::addRegion('us', $us);

		// set default region
		$defaultRegion = config('app.region') ? config('app.region') : config('app.fallback_region');
		Regionate::setRegion($defaultRegion);

		// set region for Carbon sub-class
		RegionateCarbon::setLocale(config('app.locale'));
	}
}