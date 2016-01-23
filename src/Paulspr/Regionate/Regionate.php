<?php

namespace Paulspr\Regionate;

class Regionate
{

	private static $regions = [];
	private static $currentRegionName;
	private static $currentRegion;

	public static function addRegion( $regionName, Region $region )
	{
		self::$regions[$regionName] = $region;
	}

	public static function setRegion( $regionName )
	{
		if( isset(self::$regions[$regionName]) ){
			self::$currentRegionName = $regionName;
			self::$currentRegion = self::$regions[$regionName];
		}
	}

	public static function currency($overrideRegion = null){
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;

		return $region->currency;
	}

	public static function number( $number, $decimals = null, $overrideRegion = null )
	{
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;

		if( $decimals === null ){
			$parts = explode('.', $number);
			if(sizeof($parts) > 1){
				return number_format($number, 0, $region->decimalPoint, $region->thousandsSeperator).$region->decimalPoint.$parts[1];
			}
		}

		return number_format($number, $decimals, $region->decimalPoint, $region->thousandsSeperator);
	}

	public static function money( $amount, $overrideRegion = null )
	{
		return self::number( $amount, 2, $overrideRegion);
	}

	// date methods
	public static function dateCompact( $date, $overrideRegion = null )
	{
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return strftime($region->dateCompact, strtotime($date));
	}

	public static function dateShort( $date, $overrideRegion = null )
	{
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return strftime($region->dateShort, strtotime($date));
	}

	public static function dateNormal( $date, $overrideRegion = null )
	{
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return strftime($region->dateNormal, strtotime($date));
	}

	public static function dateLong( $date, $overrideRegion = null )
	{
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return strftime($region->dateLong, strtotime($date));
	}

	public static function dateFull( $date, $overrideRegion = null )
	{
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return strftime($region->dateFull, strtotime($date));
	}

	// time methods
	public static function timeShort( $date, $overrideRegion = null )
	{
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return strftime($region->timeShort, strtotime($date));
	}

	public static function timeLong( $date, $overrideRegion = null )
	{
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return strftime($region->timeLong, strtotime($date));
	}

	// aliases
	public static function timeCompact( $date, $overrideRegion = null ){ return self::timeShort($date, $overrideRegion); }
	public static function timeNormal( $date, $overrideRegion = null ){ return self::timeShort($date, $overrideRegion); }
	public static function timeFull( $date, $overrideRegion = null ){ return self::timeLong($date, $overrideRegion); }


	// date with time
	public static function dateTimeCompact( $datetime, $overrideRegion = null )
	{
		return self::dateCompact($datetime, $overrideRegion) . ' ' . self::timeShort($datetime, $overrideRegion);
	}

	public static function dateTimeShort( $datetime, $overrideRegion = null )
	{
		return self::dateShort($datetime, $overrideRegion) . ' ' . self::timeShort($datetime, $overrideRegion);
	}

	public static function dateTimeNormal( $datetime, $overrideRegion = null )
	{
		return self::dateNormal($datetime, $overrideRegion) . ' ' . self::timeShort($datetime, $overrideRegion);
	}

	public static function dateTimeLong( $datetime, $overrideRegion = null )
	{
		return self::dateLong($datetime, $overrideRegion) . ' ' . self::timeShort($datetime, $overrideRegion);
	}

	public static function dateTimeFull( $datetime, $overrideRegion = null )
	{
		return self::dateFull($datetime, $overrideRegion) . ' ' . self::timeLong($datetime, $overrideRegion);
	}




}

