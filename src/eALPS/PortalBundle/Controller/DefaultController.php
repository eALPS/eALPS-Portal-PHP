<?php

namespace eALPS\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DefaultController extends Controller
{
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
}
