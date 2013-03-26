<?php

namespace eALPS\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
// 
use eALPS\PortalBundle\Common\Utility;

class LoginController extends Controller
{

	// 表示する年の最大数
	const COUNT_YEAR = 3;
	// 表示する年の最小値
	const MIN_YEAR = 2010;
	
	public function adminAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		
		$URLArray;
		$siteArray = array(
			'ログイン先を選択してください...' => '',
			'デフォルトサイト' => 'd',
			'全学教育機構' => 'g',
			'人文学部・人文科学研究科' => 'l',
			'教育学部・教育学研究科' => 'e',
			'経済学部・経済社会政策科学研究科' => 'k',
			'理学部・理工学研究科【理学】' => 's',
			'医学部・医学研究科' => 'm',
			'工学部・理工学研究科【工学】' => 't',
			'農学部・農学研究科' => 'a',
			'繊維学部・理工学研究科【繊維】' => 'f',
			'医学部閲覧用' => 'mv',
			'eALPSヘルプ' => 'help',
			'eALPS教職員サイト' => 'fdsd',
			'附属病院' => 'hospital',
			'大学施設' => 'facility',
			'教員免許講習' => 'teachingCredential',
			'eChes' => 'eChes',
			'フォト' => 'photo',
			'その他' => 'other',
		);
		
		for($i = $fiscalYear; $i >= self::MIN_YEAR && $fiscalYear - $i < self::COUNT_YEAR; $i--) {
			$moodleURL = Utility::getMoodleURL($i, true);
			
			foreach($siteArray as $key => $site)
			{
				$URLArray[$i][$key] = $moodleURL.'/'.$i.'/'.$site.'/login/index.php';
			}
			unset($key, $site);
		}
		
		return $this->render('eALPSPortalBundle:Login:admin.html.twig', array('URLArray' => $URLArray));
	}
	
	public function facilityAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		
		return $this->render('eALPSPortalBundle:Login:facility.html.twig', array('fiscalYear' => $fiscalYear, 'URL' => $URL));
	}
}