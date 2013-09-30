<?php

namespace eALPS\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use eALPS\PortalBundle\Entity\Info;

class InfoController extends Controller
{
	
	public function localAction()
	{
		$infoArray = $this
				-> getDoctrine()
				-> getEntityManager('info')
				-> getRepository('eALPSPortalBundle:Info')
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
	
	public function localAdminAction(Request $request)
	{
		$infoArray = $this
				-> getDoctrine()
				-> getEntityManager('info')
				-> getRepository('eALPSPortalBundle:Info')
				-> findAll();
				/*
					-> createQuery("
					SELECT id, title, body, importance, address, datetime(insertdate) as insertdate, datetime(updatedate) as updatedate, datetime(deletedate) as deletedate, term, availability
					FROM info
					ORDER BY updatedate DESC
				")
				-> getResult();
				*/
				
		$info = new Info();
		
		$insertForm = $this->createFormBuilder($info)
			->add('title', 'text')
			->add('body', 'textarea')
			->add('importance')
			->add('address')
			->add('term')
			->add('availability')
			->getForm();
		
		return $this->render('eALPSPortalBundle:Info:localAdmin.html.twig', array('infoArray' => $infoArray, 'insertForm' => $insertForm->createView(),));
	}
	
	public function insertAction(Request $request)
	{
		$info = new Info();
	
		$insertForm = $this->createFormBuilder($info)
			->add('title', 'text')
			->add('body', 'textarea')
			->add('importance')
			->add('address')
			->add('term')
			->add('availability')
			->getForm();
			
		if ($request->getMethod() == 'POST') {
			$insertForm->bindRequest($request);
			if ($insertForm->isValid()) {
				// データベースへの保存など、何らかのアクションを実行する
				
				return $this->render('eALPSPortalBundle:Default:infoLocalAdmin');
			}
		}
	}
}
 