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

	public function indexAction()
	{
		return $this->render('eALPSPortalBundle:Default:index.html.twig');
	}
	
	public function scheduleAction()
	{
		return $this->render('eALPSPortalBundle:Default:schedule.html.twig', array('appointedYear' => 0));
	}
	
	public function appointedYearScheduleAction($appointedYear) {
		return $this->render('eALPSPortalBundle:Default:schedule.html.twig', array('appointedYear' => $appointedYear));
	}
	
	public function scheduleAdminAction()
	{
		$request = $this->get('request');
		$accountId = $request->request->get('searchText');
		$appointedYear = $request->request->get('appointedYear');
		return $this->render('eALPSPortalBundle:Default:scheduleAdmin.html.twig', array('accountId' => $accountId, 'appointedYear' => $appointedYear));
	}
	
	public function scheduleAdminAccountIdAction($accountId)
	{
		return $this->render('eALPSPortalBundle:Default:scheduleAdmin.html.twig', array('accountId' => $accountId, 'appointedYear' => 0));
	}
	
	public function scheduleAdminAccountIdAppointedYearAction($accountId, $appointedYear)
	{
		return $this->render('eALPSPortalBundle:Default:scheduleAdmin.html.twig', array('accountId' => $accountId, 'appointedYear' => $appointedYear));
	}
	
	public function infoLocalAdminAction()
	{
		return $this->render('eALPSPortalBundle:Default:infoLocalAdmin.html.twig');
	}
	
}