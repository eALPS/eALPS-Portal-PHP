<?php

namespace eALPS\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use eALPS\PortalBundle\Entity\Info;
use eALPS\PortalBundle\Form\Type\InfoType;

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
		$insertForm = $this->createForm(new InfoType(), $info);
		
		$insertAction = $this->get('router')->generate('e_alps_portal_info_insert');
		
		return $this->render('eALPSPortalBundle:Info:localAdmin.html.twig', array('infoArray' => $infoArray, 'insertForm' => $insertForm->createView(), 'insertAction' => $insertAction));
	}
	
	public function insertAction(Request $request)
	{
		$info = new Info();
		$insertForm = $this->createForm(new InfoType(), $info);

		if ($request -> getMethod() == 'POST') {
			$insertForm -> bindRequest($request);
			
			$date = new DateTime();
			$info -> setInsertdate($date);
			
			$em = $this
				-> getDoctrine()
				-> getEntityManager('info');
			$em -> persist($info);
			$em -> flush();
			
			return $this->redirect($this->generateUrl('e_alps_portal_info_local_admin'));
			
		}
		
		return $this->redirect($this->generateUrl('e_alps_portal_info_local_admin'));
	}
}
 