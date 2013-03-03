<?php

namespace eALPS\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommonController extends Controller
{
	public function getCurrentYearAction()
	{
		$year = date('Y');
		return $this->render('eALPSPortalBundle:Common:getCurrentYear.html.twig', array('year' => $year));
	}
}
