<?php
class DateHelper {
	
	const RETURN_FORMAT_OBJECT = 1;
	
	const COMPARE_TYPE_FIRST_BIGGER = 1;
	const COMPARE_TYPE_SECOND_BIGGER = 2;
	const COMPARE_TYPE_EQUAL = 3;
	const COMPARE_TYPE_DIFF = 4;
	
	const DEFAULT_LOCALE = "ro_RO";
	const DEFAULT_TIMEZONE = "Europe/Bucharest";
	const DEFAULT_FORMAT = "YYYY-MM-dd hh:mm:ss";
	
	public static string $LOCALE = self::DEFAULT_LOCALE;
	public static string $TIMEZONE = self::DEFAULT_TIMEZONE;
	public static string $FORMAT = self::DEFAULT_FORMAT;
	
	/*
	** @param $date
	* accept any mysql format -> see below at $format param
	******
	** @param $format
	* all accepted from intlDateFormatter *
	* dd MMMM -> 01 Ianuarie
	* dd MMMM YYYY -> 01 Ianuarie 2022
	* YYYY-MM-dd -> 2022-01-01 ( mysql format - baza de date)
	* YYYY-MM-dd hh:mm:ss -> 2022-01-01 02:00:00 ( mysql format - baza de date)
	******
	** @param $modify
	* Examples: (+/-) 1 minute / 1 hour / 1 day / 1 month / 1 year
	*/
	public static function format($date, $format = null, $returnType = null) {
	
		$format = $format ?? self::$FORMAT;
		
		$formatter = new IntlDateFormatter 
		(
		    self::$LOCALE, 		  // the locale to use, e.g. 'en_GB'
		    IntlDateFormatter::FULL,  // how the date should be formatted, e.g. IntlDateFormatter::FULL
		    IntlDateFormatter::FULL,  // how the time should be formatted, e.g. IntlDateFormatter::FULL 
		    self::$TIMEZONE          // the time should be returned in which timezone
		);
	
		$obj = new DateTime($date);
		$formatter->setPattern($format);
			
		if ($returnType === self::RETURN_FORMAT_OBJECT)
			return $obj;
		else
			return $formatter->format($obj);

	}
	
	public static function modify($date, $modify = null, $format = null, $returnType = null) {

		$dateObject = self::format($date, $format, self::RETURN_FORMAT_OBJECT);
		
		if (!$modify) 
			$modify = "+0 days";
		
		$dateObject->modify($modify);
			
		if ($returnType === self::RETURN_FORMAT_OBJECT)
			return $dateObject;
		else
			return $formatter->format($dateObject);
		
	}
	
	public static function compareBool($date, $dateToCompare, $compareType = null) {
	
		$compareType = $compareType ?? self::COMPARE_TYPE_FIRST_BIGGER;
		$dateObject = self::format($date, null, self::RETURN_FORMAT_OBJECT);
		$dateObjectToCompare = self::format($dateToCompare, null, self::RETURN_FORMAT_OBJECT);
		
		if ($compareType === self::COMPARE_TYPE_FIRST_BIGGER && $dateObject > $dateObjectToCompare)
			return true;
			
		elseif ($compareType === self::COMPARE_TYPE_SECOND_BIGGER && $dateObject < $dateObjectToCompare) 
			return true;
			
		elseif ($compareType === self::COMPARE_TYPE_EQUAL && $dateObject == $dateObjectToCompare) 
			return true;

		else
			return false;
	}
	
	public static function compareModifyBool($firstDate, $secondDate, $firstDateModify = null, $secondDateModify = null, $compareType = null, $compareValue = null) {
	
		$compareType = $compareType ?? self::COMPARE_TYPE_FIRST_BIGGER;
		$firstDateObject = self::modify($firstDate, $firstDateModify, null, self::RETURN_FORMAT_OBJECT);
		$secondDateObject = self::modify($secondDate, $secondDateModify, null, self::RETURN_FORMAT_OBJECT);
		
		if($compareValue) 
		{
			$difference = $secondDateObject->diff($firstDateObject);
			$difference = $difference->format("%a") <= $compareValue;
		}
		
		if ($compareType === self::COMPARE_TYPE_FIRST_BIGGER && $firstDateObject > $secondDateObject)
			return true;
			
		elseif ($compareType === self::COMPARE_TYPE_SECOND_BIGGER && $firstDateObject < $secondDateObject) 
			return true;
			
		elseif ($compareType === self::COMPARE_TYPE_EQUAL && $firstDateObject == $secondDateObject) 
			return true;

		elseif ($compareType === self::COMPARE_TYPE_DIFF && isset($difference) && $difference)
			return true;
			
		else
			return false;
	}
}
?>