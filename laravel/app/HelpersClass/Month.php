<?php
namespace App\HelpersClass;

/**
 *
 */
class Month
{
	public static function getListMonthInYear1()
	{
		$arrayMonth = [];
		$day = date('d');
		$year = date('Y');
		///lấy các ngày
		for ($month = 1 ; $month <= 12 ; $month++){
			$time = mktime(12,0,0,$month,10,$year);
			if(date('Y',$time) == $year){
                $arrayMonth[] = date('Y-m', $time);
            }
		}
        return $arrayMonth;

	}
    public static function getListMonthInYear()
	{
		$arrayMonth = [];
		$day = date('d');
		$year = date('Y');
		///lấy các ngày
		for ($month = 1 ; $month <= 12 ; $month++){
			$time = mktime(12,0,0,$month,10,$year);
			if(date('Y',$time) == $year){
                $arrayMonth[] = date('m', $time);
            }
		}
        return $arrayMonth;

	}
}
