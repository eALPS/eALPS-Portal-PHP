<?php

namespace eALPS\PortalBundle\Common;

/**
 * Utilityクラス
 *
 * @author Osamu HASEGAWA <osamu@shinshu-u.ac.jp>
 */
class Utility
{

	/**
	 * getFiscalYear function.
	 * 現在の年度を取得する．
	 * 運用上の問題で3月は次年度とする．
	 * 
	 * @access public
	 * @return int, 年度
	 */
	public static function getFiscalYear()
	{
		if(date('n') < 3) {
			return date('Y') - 1;
		} else {
			return date('Y');
		}
	}
	
	/**
	 * toENSemester function.
	 * 日本語の開講時期を英語に変換する．
	 * 
	 * @access public
	 * @param string $jpSeme, 開講時期(ex 前期．前期(集中)．後期，後期(集中)，通年)
	 * @return string, 開講時期の英語表記
	 */
	public static function toENSemester($jpSeme)
	{
		$semester = '';
		if(($jpSeme == '前期')||($jpSeme == '前期(集中)')||($jpSeme == '前期(前半)')||($jpSeme == '前期(後半)')) {
			$semester = 'firstSemester';
		} else if(($jpSeme == '後期')||($jpSeme == '後期(集中)')||($jpSeme == '後期(前半)')||($jpSeme == '後期(後半)')) {
			$semester = 'secondSemester';
		} else if(($jpSeme == '通年')||($jpSeme == '通年(集中)')) {
			$semester = 'throughSemester';
		} else if($jpSeme == '不定期') {
			$semester = 'irregularSemester';
		}
		return $semester;
	}
	
	public static function getMoodleURL($year, $ssl)
	{
		$protocol = '';
		$URL = '';
		
		if($ssl)
		{
			$protocol = 'https://';
		} else {
			$protocol = 'http://';
		}
		
		if($year >= 2013)
		{
			$URL = $protocol.'moodle-cloud.ealps.shinshu-u.ac.jp';
		} else {
			$URL = $protocol.'moodle.ealps.shinshu-u.ac.jp';
		}
		return $URL;
	}

}

?>