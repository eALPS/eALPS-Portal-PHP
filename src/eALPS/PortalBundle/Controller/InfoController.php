<?php

namespace eALPS\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class InfoController extends Controller
{
	public function indexAction()
	{
		// アカウントID
		$accountId = '11TA110E';
		$accountId = '10S5601G';
		$accountId = '09L1026C';
		$accountId = '12K1003F';
		$accountId = '48805225';
		$accountId = '48806437';
		$accountId = 'niimura225';
		$accountId = '12L1081J';
		$accountId = $id = $this->get('request')->server->get('uid');
		
		return $this->render('eALPSPortalBundle:Schedule:schedule.html.twig', $this -> createView($accountId));
	}

	public function adminAction($accountId)
	{
		return $this->render('eALPSPortalBundle:Schedule:schedule.html.twig', $this -> createView($accountId));
	}
	
	public function localAction()
	{
		$infoArray = $this
				-> getDoctrine()
				-> getEntityManager('info')
				-> getRepository('eALPSPortalBundle:info')
				-> findByAvailability(1);
				/*
					-> createQuery("
					SELECT id, title, body, importance, address, datetime(insertdate) as insertdate, datetime(updatedate) as updatedate, datetime(deletedate) as deletedate, term, availability
					FROM info
					ORDER BY updatedate DESC
				")
				-> getResult();
				*/
				
		return $this->render('eALPSPortalBundle:Info:local.html.twig', array('infoArray' => $infoArray));
	}
}
 