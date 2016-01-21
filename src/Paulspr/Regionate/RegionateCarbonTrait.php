<?php
namespace Paulspr\Regionate;

// This trait contains a copy and paste of the identically named methods
// from Laravel's Eloquent model, however anything referring to a Carbon
// instance is replaced with an instance of our own RegionateCarbon class.
// Ensure the /app/traits directory is included in your composer.json for autoload
trait RegionateCarbonTrait
{

	public function freshTimestamp()
	{
		// was previously:  return new Carbon;
		return new RegionateCarbon;
	}

	protected function asDateTime($value)
	{

		if (is_numeric($value)) {

			// was previously:  return Carbon::createFromTimestamp($value);
			return RegionateCarbon::createFromTimestamp($value);

		} elseif (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $value)) {

			// was previously:    return Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
			return RegionateCarbon::createFromFormat('Y-m-d', $value)->startOfDay();

		} elseif (! $value instanceof DateTime) {

			$format = $this->getDateFormat();

			// was previously:  return Carbon::createFromFormat($format, $value);
			return RegionateCarbon::createFromFormat($format, $value);

		}

		// was previously:  return Carbon::instance($value);
		return RegionateCarbon::instance($value);
	}

}