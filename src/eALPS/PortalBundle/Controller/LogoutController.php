<?php

namespace eALPS\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
// 
use eALPS\PortalBundle\Common\Utility;

class LogoutController extends Controller
{

	// 表示する年の最大数
	const COUNT_YEAR = 3;
	// 表示する年の最小値
	const MIN_YEAR = 2010;
	
	public function eALPSAction()
	{
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		// URL
		$URL = Utility::getMoodleURL($fiscalYear, true);
		
		return $this->render('eALPSPortalBundle:Logout:eALPS.html.twig', array('fiscalYear' => $fiscalYear, 'URL' => $URL));
	}
}