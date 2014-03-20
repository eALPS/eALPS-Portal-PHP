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
	 * 運用上の問題で3月20日以降は次年度とする．
	 * 
	 * @access public
	 * @return int, 年度
	 */
	public static function getFiscalYear()
	{
		if(date('n') < 4) {
			if(date('n') == 3 && date('j') > 19) {
				return date('Y');
			} else {
				return date('Y') - 1;
			}
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
	
	/**
	 * getMoodleURL function.
	 * 年度からMoodleのURLを取得する．
	 * 
	 * @access public
	 * @param int $year(xxxx)
	 * @return boolean $ssl
	 */
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
	
	public static function getHostNameArray() 
	{
		$hostNameArray = array(
			'WEB1' => 'ec2-54-250-120-41.ap-northeast-1.compute.amazonaws.com',
			'WEB2' => 'ec2-54-250-120-128.ap-northeast-1.compute.amazonaws.com',
		);
		return $hostNameArray;
	}
	
	public static function getDepartmentArray() 
	{
		$departmentArray = array(
			'共通教育' => 'g',
			'人文学部・人文科学研究科' => 'l',
			'教育学部・教育学研究科' => 'e',
			'経済学部・経済社会政策科学研究科' => 'k',
			'理学部・理工学研究科【理学】' => 's',
			'医学部・医学研究科' => 'm',
			'工学部・理工学研究科【工学】' => 't',
			'農学部・農学研究科' => 'a',
			'繊維学部・理工学研究科【繊維】' => 'f',
			'総合工学系研究科' => 'st',
			'学部・研究科共通' => 'common',
		);

		return $departmentArray;
	}
	
	public static function getUpdateSiteArray()
	{
		$allSiteArray = array(
			'ログイン先を選択してください...' => '',
			'デフォルトサイト' => 'd',
			'共通教育' => 'g',
			'人文学部・人文科学研究科' => 'l',
			'教育学部・教育学研究科' => 'e',
			'経済学部・経済社会政策科学研究科' => 'k',
			'理学部・理工学研究科【理学】' => 's',
			'医学部・医学研究科' => 'm',
			'医学部閲覧用' => 'mv',
			'工学部・理工学研究科【工学】' => 't',
			'農学部・農学研究科' => 'a',
			'繊維学部・理工学研究科【繊維】' => 'f',
			'総合工学系研究科' => 'st',
			'eChes' => 'eChes',
			'フォト' => 'photo',
			'テスト' => 'test',
		);
		
		return $allSiteArray;
	}
	
	public static function getConstantSiteArray()
	{
		$allSiteArray = array(
			'ログイン先を選択してください...' => '',
			'学部・研究科共通' => 'common',
			'eALPSヘルプ' => 'help',
			'eALPS教職員用サイト' => 'fdsd',
			'附属病院' => 'hospital',
			'大学施設' => 'facility',
			'教員免許講習' => 'teachingCredential',
			'学外連携・その他' => 'other',
		);
		
		return $allSiteArray;
	}
	
	/**
	 * getHttpStatusCode function
	 * 引数で与えられたURLのステータスコードを取得する
	 * 
	 * @access public
	 * @param string $url
	 * @return int $statusCode
	 */
	public static function getHttpStatusCode($url)
	{
		if(($fp=fopen($url,'r',false,stream_context_create(array('http'=>array('ignore_errors'=>true)))))!==false)
		{
			fclose($fp);
			return preg_match('#^HTTP/\d\.\d (\d+) .+$#',$http_response_header[0],$matches)===1?(int)$matches[1]:false;
		} else {
			return false;
		}
	}

}

?>