<?php

namespace eALPS\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
// 
use eALPS\PortalBundle\Common\Utility;

class DefaultController extends Controller
{

	// 表示する年の最大数
	const COUNT_YEAR = 3;
	// 表示する年の最小値
	const MIN_YEAR = 2010;


	public function indexAction()
	{
		return $this->render('eALPSPortalBundle:Default:index.html.twig');
	}
	
	public function scheduleAdminAction()
	{
		$request = $this->get('request');
		$accountId = $request->request->get('searchText'); 
		return $this->render('eALPSPortalBundle:Default:scheduleAdmin.html.twig', array('accountId' => $accountId));
	}
	
	public function scheduleAdminAccountIdAction($accountId)
	{
		return $this->render('eALPSPortalBundle:Default:scheduleAdmin.html.twig', array('accountId' => $accountId));
	}
	
	public function adminLoginAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		
		$URLArray;
		$siteArray = array(
			'ログイン先を選択してください...' => '',
			'デフォルトサイト' => 'd',
			'共通教育' => 'g',
			'人文学部' => 'l',
			'教育学部' => 'e',
			'経済学部' => 'k',
			'理学部' => 's',
			'医学部' => 'm',
			'工学部' => 't',
			'農学部' => 'a',
			'繊維学部' => 'f',
			'医学部閲覧用' => 'mv',
			'eALPSヘルプ' => 'help',
			'eALPS教職員サイト' => 'fdsd',
			'附属病院' => 'hospital',
			'大学施設' => 'facility',
			'教員免許講習' => 'teachingCredential',
			'eChes' => 'eChes',
			'フォト' => 'photo',
			'その他' => 'other'
		);
		
		for($i = $fiscalYear; $i >= self::MIN_YEAR && $fiscalYear - $i < self::COUNT_YEAR; $i--) {
			$moodleURL = Utility::getMoodleURL($i, true);
			
			foreach($siteArray as $key => $site)
			{
				$URLArray[$i][$key] = $moodleURL.'/'.$i.'/'.$site.'/login/index.php';
			}
			unset($key, $site);
		}
		
		return $this->render('eALPSPortalBundle:Default:adminLogin.html.twig', array('URLArray' => $URLArray));
	}
}