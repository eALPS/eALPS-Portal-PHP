<?php

namespace eALPS\PortalBundle\Controller;

use \DateTime;

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
				
		$insertInfo = new Info();
		$insertForm = $this->createForm(new InfoType(), $insertInfo);
		$insertAction = $this->get('router')->generate('e_alps_portal_info_insert');
		
		$updateInfo = new Info();
		$updateForm = $this->createForm(new InfoType(), $updateInfo);
		$updateAction = $this->get('router')->generate('e_alps_portal_info_update');
		
		$deleteAction = $this->get('router')->generate('e_alps_portal_info_delete');
		
		return $this->render('eALPSPortalBundle:Info:localAdmin.html.twig', array('infoArray' => $infoArray, 'insertForm' => $insertForm->createView(), 'insertAction' => $insertAction, 'updateForm' => $updateForm->createView(), 'updateAction' => $updateAction, 'deleteAction' => $deleteAction));
	}
	
	public function insertAction(Request $request)
	{
		$insertInfo = new Info();
		$insertForm = $this->createForm(new InfoType(), $insertInfo);

		if ($request -> getMethod() == 'POST') {
			$insertForm -> bindRequest($request);
			
			$date = new DateTime();
			$insertInfo -> setInsertdate($date -> format('Y-m-d H:i:s'));
			$insertInfo -> setUpdatedate($date -> format('Y-m-d H:i:s'));
			
			$em = $this
				-> getDoctrine()
				-> getEntityManager('info');
			$em -> persist($insertInfo);
			$em -> flush();
			
			return $this->redirect($this->generateUrl('e_alps_portal_info_local_admin'));
			
		}
		
		return $this->redirect($this->generateUrl('e_alps_portal_info_local_admin'));
	}
	
	public function updateAction(Request $request)
	{	
		$tmpInfo = new Info();
		$updateForm = $this->createForm(new InfoType(), $tmpInfo);

		if ($request -> getMethod() == 'POST') {
			$updateForm -> bindRequest($request);
			
			$em = $this
				-> getDoctrine()
				-> getEntityManager('info');
			$updateInfo = $em -> getRepository('eALPSPortalBundle:Info')
				-> find($tmpInfo->getId());
			
			$updateInfo -> setTitle($tmpInfo -> getTitle());
			$updateInfo -> setBody($tmpInfo -> getBody());
			$updateInfo -> setImportance($tmpInfo -> getImportance());
			$updateInfo -> setAddress($tmpInfo -> getAddress());
			$updateInfo -> setAvailability($tmpInfo -> getAvailability());
			$date = new DateTime();
			$updateInfo -> setUpdatedate($date -> format('Y-m-d H:i:s'));
						
			$em -> flush();
			
			return $this->redirect($this->generateUrl('e_alps_portal_info_local_admin'));
			
		}
		
		return $this->redirect($this->generateUrl('e_alps_portal_info_local_admin'));
	}
	
	public function deleteAction(Request $request)
	{	
		$deleteId->request->get('id');

		if ($request -> getMethod() == 'POST')
		{
			$em = $this
				-> getDoctrine()
				-> getEntityManager('info');
			$deleteInfo = $em -> getRepository('eALPSPortalBundle:Info')
				-> find($deleteId);
				
			$em->remove($deleteInfo);
			$em -> flush();
			
			return $this->redirect($this->generateUrl('e_alps_portal_info_local_admin'));
			
		}
		
		return $this->redirect($this->generateUrl('e_alps_portal_info_local_admin'));
	}
}
 