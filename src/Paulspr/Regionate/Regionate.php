<?php

namespace Paulspr\Regionate;

class Regionate
{

	private static $regions = [];
	private static $currentRegionName;
	private static $currentRegion;

	public static function addRegion( $regionName, Region $region ){
		self::$regions[$regionName] = $region;
	}

	public static function setRegion( $regionName ){

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

	public static function dateCompact( $date, $overrideRegion = null ){
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return date($region->dateCompact, strtotime($date));
	}
	public static function dateShort( $date, $overrideRegion = null ){
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return date($region->dateShort, strtotime($date));
	}
	public static function dateNormal( $date, $overrideRegion = null ){
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return date($region->dateNormal, strtotime($date));
	}
	public static function dateLong( $date, $overrideRegion = null ){
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return date($region->dateLong, strtotime($date));
	}
	public static function dateFull( $date, $overrideRegion = null ){
		$region = $overrideRegion ? self::$regions[$overrideRegion] : self::$currentRegion;
		return date($region->dateFull, strtotime($date));
	}





}

