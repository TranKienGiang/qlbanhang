<?php
namespace App\HelpersClass;

/**
 *
 */
class Year
{
	public static function getListYear()
	{
		$arrayYear = [];
        $yearnow = date('Y');
		///lấy các ngày
		for ($year = $yearnow - 2 ; $year <= $yearnow ; $year++){
			$time = mktime(12,0,0,1,5,$year);
                $arrayYear[] = date('Y',$time);
		}
        return $arrayYear;

	}
}
