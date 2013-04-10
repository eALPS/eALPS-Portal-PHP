<?php

namespace eALPS\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
// 
use eALPS\PortalBundle\Common\Utility;

class RedirectController extends Controller
{
	
	public function indexAction()
	{
		return $this->render('eALPSPortalBundle:Default:scheduleAdmin.html.twig');
	}
	
	public function redirectMoodleCourseAction($opYear, $siteCode, $titleCode)
	{
		$moodleURL = Utility::getMoodleURL($opYear, true);
		$jsonCourseId = @file_get_contents("$moodleURL/$opYear/$siteCode/api/getInnerCode.php?code=$titleCode", true);
		
		$redirectURL;
		
		$courseIdArray = null;
		if($jsonCourseId == false)
		{
			return $this->render('eALPSPortalBundle:Error:redirectMoodleCourseError.html.twig', array('opYear' => $opYear, 'siteCode' => $siteCode, 'titleCode' => $titleCode));
		} else {
			$courseIdArray = json_decode($jsonCourseId, true);
			if(is_null($courseIdArray) || ($http_response_header[0] == 'HTTP/1.1 404 Not Found') || !array_key_exists($titleCode, $courseIdArray))
			{
				return $this->render('eALPSPortalBundle:Error:redirectMoodleCourseError.html.twig', array('opYear' => $opYear, 'siteCode' => $siteCode, 'titleCode' => $titleCode));
			} else {
				$redirectURL = "$moodleURL/$opYear/$siteCode/course/view.php?id=$courseIdArray[$titleCode]";
			}
		}
		
		return $this->redirect($redirectURL);
	}
	
	public function redirectMoodleCourseInfoAction($opYear, $siteCode, $titleCode)
	{
		$moodleURL = Utility::getMoodleURL($opYear, true);
		$jsonCourseId = @file_get_contents("$moodleURL/$opYear/$siteCode/api/getInnerCode.php?code=$titleCode", true);
		
		$redirectURL;
		
		$courseIdArray = null;
		if($jsonCourseId == false)
		{
			return $this->render('eALPSPortalBundle:Error:redirectMoodleCourseError.html.twig', array('opYear' => $opYear, 'siteCode' => $siteCode, 'titleCode' => $titleCode));
		} else {
			$courseIdArray = json_decode($jsonCourseId, true);
			if(is_null($courseIdArray) || ($http_response_header[0] == 'HTTP/1.1 404 Not Found') || !array_key_exists($titleCode, $courseIdArray))
			{
				return $this->render('eALPSPortalBundle:Error:redirectMoodleCourseError.html.twig', array('opYear' => $opYear, 'siteCode' => $siteCode, 'titleCode' => $titleCode));
			} else {
				$redirectURL = "$moodleURL/$opYear/$siteCode/course/info.php?id=$courseIdArray[$titleCode]";
			}
		}
		
		return $this->redirect($redirectURL);
	}
	
}