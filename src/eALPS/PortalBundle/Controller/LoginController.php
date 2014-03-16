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
		// 管理者用のログイン画面なので1月1日から次年度のタブを表示する
		$year = date('Y');
		
		// 年度更新するサイトのURLリスト
		$updateSiteURLArray;
		$updateSiteArray = Utility::getUpdateSiteArray();
		for($i = $year; $i >= self::MIN_YEAR && $year - $i < self::COUNT_YEAR; $i--) {
			$moodleURL = Utility::getMoodleURL($i, true);
			
			foreach($updateSiteArray as $key => $site)
			{
				$updateSiteURLArray[$i][$key]['url'] = $moodleURL.'/'.$i.'/'.$site.'/login/index.php';
				$updateSiteURLArray[$i][$key]['siteENName'] = $site;
			}
			unset($key, $site);
		}
		
		// 年度更新しないサイトのURLリスト
		$constantSiteURLArray;
		$constantSiteArray = Utility::getConstantSiteArray();
		foreach($constantSiteArray as $key => $site)
		{
			$constantSiteURLArray[$key]['url'] = $moodleURL.'/'.$site.'/login/index.php';
			$constantSiteURLArray[$key]['siteENName'] = $site;
		}
		unset($key, $site);
		
		//ロードバランサを経由しないホストのURL
		$hostNameArray = Utility::getHostNameArray();
		$helthCheckPage = '/misc/healthcheck.html';
		$notELBURL = false;
		foreach($hostNameArray as $key => $hostName) {
			$statusCode = Utility::getHttpStatusCode('http://'.$hostName.$helthCheckPage);
			if(strncmp("2xx", $statusCode, 1) == 0) {
				$notELBURL = 'https://'.$hostName;
				break;
			} else {
				$notELBURL = false;
			}
		}
		
		return $this->render('eALPSPortalBundle:Login:admin.html.twig', array('updateSiteURLArray' => $updateSiteURLArray, 'constantSiteURLArray' => $constantSiteURLArray, 'notELBURL' => $notELBURL));
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
		$URLArray;
		for($i = $fiscalYear; $i >= 2013 && $fiscalYear - $i < self::COUNT_YEAR; $i--) {
			$moodleURL = Utility::getMoodleURL($i, true);
			$URLArray[$i] = $moodleURL.'/'.$i.'/eChes/login/index.php';
		}
		
		return $this->render('eALPSPortalBundle:Login:eChes.html.twig', array('URLArray' => $URLArray));
	}
	
	public function eChesAppointedYearAction($appointedYear)
	{
		// URL
		$URLArray;
		for($i = $appointedYear; $i >= 2013 && $appointedYear - $i < self::COUNT_YEAR; $i--) {
			$moodleURL = Utility::getMoodleURL($i, true);
			$URLArray[$i] = $moodleURL.'/'.$i.'/eChes/login/index.php';
		}
		
		return $this->render('eALPSPortalBundle:Login:eChes.html.twig', array('URLArray' => $URLArray));
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
		$siteName = '教職員用 FD&SD';
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