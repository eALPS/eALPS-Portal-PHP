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
		
		$hostNameArray = Utility::getHostNameArray();
		
		$URLArray;
		
		$notELBURL = false;
		
		$siteArray = array(
			'ログイン先を選択してください...' => '',
			'デフォルトサイト' => 'd',
			'共通教育' => 'g',
			'人文学部・人文科学研究科' => 'l',
			'教育学部・教育学研究科' => 'e',
			'経済学部・経済社会政策科学研究科' => 'k',
			'理学部・理工学研究科【理学】' => 's',
			'医学部・医学研究科' => 'm',
			'工学部・理工学研究科【工学】' => 't',
			'農学部・農学研究科' => 'a',
			'繊維学部・理工学研究科【繊維】' => 'f',
			'総合工学系研究科' => 'mv',
			'eALPSヘルプ' => 'help',
			'eALPS教職員サイト' => 'fdsd',
			'附属病院' => 'hospital',
			'大学施設' => 'facility',
			'教員免許講習' => 'teachingCredential',
			'学外連携・その他' => 'other',
			'eChes' => 'eChes',
			'フォト' => 'photo',
		);
		
		for($i = $fiscalYear; $i >= self::MIN_YEAR && $fiscalYear - $i < self::COUNT_YEAR; $i--) {
			$moodleURL = Utility::getMoodleURL($i, true);
			
			foreach($siteArray as $key => $site)
			{
				$URLArray[$i][$key]['url'] = $moodleURL.'/'.$i.'/'.$site.'/login/index.php';
				$URLArray[$i][$key]['siteENName'] = $site;
			}
			unset($key, $site);
		}
		
		for($hostNameArray as $key => $hostName)
		{
			$statusCode = Utility::getgetHttpStatusCode($hostName);
			if(strncmp("2xx", $statusCode, 1) == 0)
			{
				$notELBURL = 'https://'.$hostName;
			} else {
				$notELBURL = false;
			}
		}
		
		return $this->render('eALPSPortalBundle:Login:admin.html.twig', array('URLArray' => $URLArray, 'notELBURL' => $notELBURL));
	}
	
	public function acsuErrorAction() {
		$auth = $this->get('request')->query->get('auth');
		if( $auth != 'error'){
			return $this->redirect('https://idp-cloud.ealps.shinshu-u.ac.jp/idp/Authn/UserPassword?auth=manual');
		}
		
		return $this->render('eALPSPortalBundle:Login:acsuError.html.twig', array('auth' => $auth));
	}
	
	public function citizenAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		
		return $this->render('eALPSPortalBundle:Login:citizen.html.twig', array('fiscalYear' => $fiscalYear, 'URL' => $URL));
	}
	
	public function eChesAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		
		return $this->render('eALPSPortalBundle:Login:eChes.html.twig', array('fiscalYear' => $fiscalYear, 'URL' => $URL));
	}
	
	public function facilityAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		
		return $this->render('eALPSPortalBundle:Login:facility.html.twig', array('fiscalYear' => $fiscalYear, 'URL' => $URL));
	}
	
	public function fdsdAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		
		return $this->render('eALPSPortalBundle:Login:fdsd.html.twig', array('fiscalYear' => $fiscalYear, 'URL' => $URL));
	}
	
	public function autoFdSdAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		// Request
		$username = $this->getRequest()->request->get('username');
		$password = $this->getRequest()->request->get('password');
		// siteCode
		$siteCode = 'fdsd';
		// サイト名
		$siteName = '教職員 FD SD';
		// リダイレクトURL
		$redirectURL = "$URL/$fiscalYear/$siteCode/login/index.php";

		return $this->render('eALPSPortalBundle:Login:auto.html.twig', array('redirectURL' => $redirectURL, 'siteName' => $siteName, 'username' => $username, 'password' => $password ));
	}
	
	public function otherAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		
		return $this->render('eALPSPortalBundle:Login:other.html.twig', array('fiscalYear' => $fiscalYear, 'URL' => $URL));
	}
	
	public function teachingCredentialAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		
		return $this->render('eALPSPortalBundle:Login:teachingCredential.html.twig', array('fiscalYear' => $fiscalYear, 'URL' => $URL));
	}
	
	public function autoTeachingCredentialAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		// Request
		$username = $this->getRequest()->request->get('username');
		$password = $this->getRequest()->request->get('password');
		// siteCode
		$siteCode = 'teachingCredential';
		// サイト名
		$siteName = '教職員免許更新講習';
		// リダイレクトURL
		$redirectURL = "$URL/$fiscalYear/$siteCode/login/index.php";

		return $this->render('eALPSPortalBundle:Login:auto.html.twig', array('redirectURL' => $redirectURL, 'siteName' => $siteName, 'username' => $username, 'password' => $password ));
	}
	
	public function helpAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		
		return $this->render('eALPSPortalBundle:Login:help.html.twig', array('fiscalYear' => $fiscalYear, 'URL' => $URL));
	}
	
	public function hospitalAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		
		return $this->render('eALPSPortalBundle:Login:hospital.html.twig', array('fiscalYear' => $fiscalYear, 'URL' => $URL));
	}
}