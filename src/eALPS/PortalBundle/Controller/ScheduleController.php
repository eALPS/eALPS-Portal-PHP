<?php

namespace eALPS\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

// 
use eALPS\PortalBundle\Common\Utility;
use eALPS\PortalBundle\Common\Schedule;
use eALPS\PortalBundle\Entity\RelationRole;

class ScheduleController extends Controller
{
	// 表示する年の最大数
	const COUNT_YEAR = 3;
	// 表示する年の最小値
	const MIN_YEAR = 2010;

	public function indexAction() {
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

	public function adminAction($accountId) {
		return $this->render('eALPSPortalBundle:Schedule:schedule.html.twig', $this -> createView($accountId));
	}
	
	public function createView($accountId) {
		// 表示用配列
		$courseViewArray = array();
		$courseYearViewArray = array();
		
		// 年度
		$fiscalYear = Utility::getFiscalYear();
		
		// 表示用の初期インスタンスを生成
		for($i = $fiscalYear; $i >= self::MIN_YEAR && $fiscalYear - $i < self::COUNT_YEAR; $i--) {
			$schedule = new Schedule();
			$courseYearViewArray['courseSchedule'] = $schedule;
			
			$courseList = array();
			$courseYearViewArray['courseList'] = $courseList;
			
			$ealpsList = Utility::getDepartmentArray();
			$ealpsListURL = Utility::getMoodleURL($i, true);
			$courseYearViewArray['ealpsList'] = array(
				$ealpsListURL => $ealpsList,
			);
			
			$courseViewArray[$i] = $courseYearViewArray;
		}

		$relationArray = $this
				-> getDoctrine()
				-> getEntityManager('adb')
				-> createQuery('
					SELECT relation 
					FROM eALPSPortalBundle:Relation relation, eALPSPortalBundle:Account account, eALPSPortalBundle:Course course, eALPSPortalBundle:CourseAttr courseattr, eALPSPortalBundle:CourseAttrType courseattrtype
					WHERE account.uid = :accountUId
					AND relation.account = account
					AND relation.course = course
					AND relation.course = courseattr.course
					AND courseattr.courseAttrType = courseattrtype
					AND courseattrtype.id = 4
					AND NOT courseattr.value = 0
					AND course.enable = 1
					AND courseattr.enable = 1
					AND course.name BETWEEN :minYear AND :fiscalYear
					AND relation.enable = 1
					ORDER BY course.name
				')
				-> setParameters(array(
					'accountUId' => $accountId,
					'minYear' => $fiscalYear - 2,
					'fiscalYear' => $fiscalYear,
				))
				-> getResult();
		
		foreach($relationArray as $relation) {
			$course = array();
			$course['opDayHour'] = array();
			$course['opDay'] = '';
			$course['opHour'] = '';
			
			$courseAttrArray = $this
				-> getDoctrine()
				-> getEntityManager('adb')
				-> getRepository('eALPSPortalBundle:CourseAttr')
				-> createQueryBuilder('course_attr')
				-> where('course_attr.course = :course')
				-> andWhere('course_attr.enable = 1')
				-> setParameter('course', $relation -> getCourse())
				-> orderBy('course_attr.original', 'DESC')
				-> getQuery()
				-> getResult();
				//-> findByCourse($relation -> getCourse());
				
			foreach($courseAttrArray as $courseAttr) {
				$courseAttrName = $courseAttr 
					-> getCourseAttrType() 
					-> getName();
				if($courseAttr -> getCourseAttrType() -> getId() == 10)
				{
					$opDayHourTmpArray = explode(',', $courseAttr -> getValue());
					foreach($opDayHourTmpArray as $opDayHourTmp) {
						$course[$courseAttrName][] = $opDayHourTmp;
					}
					unset($opDayHourTmp);
					//$course[$courseAttrName] = explode(',', $courseAttr -> getValue());
				} else {
					$course[$courseAttrName] = $courseAttr -> getValue();
				}
			}
			unset($courseAttr);
			
			if(($course['opYear'] < self::MIN_YEAR) || ($course['opYear'] < ($fiscalYear - self::COUNT_YEAR)) ) {
				continue;
			}
			
			// ソースが読みづらくなるので必要な変数を定義
			$courseDepCode = strtolower($course['depCode'][0]);
			$courseOpYear = $course['opYear'];
			$courseTitleCode = $course['titleCode'];
			
			// 担当教員を取得
			$courseTeacherArray = $this
				-> getDoctrine()
				-> getEntityManager('adb')
				-> createQuery('
					SELECT aa
					FROM eALPSPortalBundle:Relation r, eALPSPortalBundle:RelationRole rr, eALPSPortalBundle:AccountAttr aa, eALPSPortalBundle:AccountAttrType aat
					WHERE r.course = :course
					AND r.relationRole = rr
					AND rr.id = 1
					AND r.account = aa.account
					AND aa.accountAttrType  = aat
					AND aat.id = 4
				')
				-> setParameters(array(
					'course' => $relation -> getCourse(),
				))
				->getResult();
			
			// 副担当教員を取得
			$courseSubTeacherArray = $this
				-> getDoctrine()
				-> getEntityManager('adb')
				-> createQuery('
					SELECT aa
					FROM eALPSPortalBundle:Relation r, eALPSPortalBundle:RelationRole rr, eALPSPortalBundle:AccountAttr aa, eALPSPortalBundle:AccountAttrType aat
					WHERE r.course = :course
					AND r.relationRole = rr
					AND rr.id = 2
					AND r.account = aa.account
					AND aa.accountAttrType  = aat
					AND aat.id = 4
				')
				-> setParameters(array(
					'course' => $relation -> getCourse(),
				))
				->getResult();
			
			
			// 必要な情報をコースに追加
			$course['semester'] = Utility::toENSemester($course['lecPeriod']);
			$course['relation'] = $relation;
			$course['teachers'] = '';
			$course['teacherArray'] = array();
			$course['subTeachers'] = '';
			$course['subTeacherArray'] = array();			
			$course['URL'] = $this->get('router')->generate('e_alps_portal_redirect_moodle_course', array('opYear' => $courseOpYear, 'depCode' => $courseDepCode, 'titleCode' => $courseTitleCode));
			$course['informationURL'] = $this->get('router')->generate('e_alps_portal_redirect_moodle_course_info', array('opYear' => $courseOpYear, 'depCode' => $courseDepCode, 'titleCode' => $courseTitleCode));
			$course['URLTarget'] = '_blank';
			
			foreach($courseTeacherArray as $courseTeacher) {
				$course['teacherArray'][] = mb_convert_kana($courseTeacher -> getValue(), "s", "UTF-8");
				$course['teachers'] = $course['teachers'].'，'.mb_convert_kana($courseTeacher -> getValue(), "s");
			}
			unset($courseTeacher);
			$course['teachers'] = ltrim($course['teachers'], "，");
			
			foreach($courseSubTeacherArray as $courseSubTeacher) {
				$course['subTeacherArray'][] = mb_convert_kana($courseSubTeacher -> getValue(), "s", "UTF-8");
				$course['subTeachers'] = $course['subTeachers'].'，'.mb_convert_kana($courseSubTeacher -> getValue(), "s", "UTF-8");
			}
			unset($courseSubTeacher);
			$course['subTeachers'] = ltrim($course['subTeachers'], "，");	
			
			// コースを表示表の配列にに追加
			// 時間割
			//$opDayHourArray = $course['opDayHour'];
			foreach($course['opDayHour'] as $opDayHour) {
				$opDayHourArray = explode('-', $opDayHour);
				$course['opDay'] = $opDayHourArray[0];
				$course['opHour'] = $opDayHourArray[1];
				
				if($course['opDay'] == '集中' || $course['opHour'] == '' || $course['opHour'] == '不定') {
					$courseViewArray[$course['opYear']]['courseSchedule'] -> otherCourseArray[] = $course;
				} else {
					$courseViewArray[$course['opYear']]['courseSchedule'] -> table[$course['opHour']][$course['opDay']][] = $course;
				}
			
			}
			unset($opDayHour);
			
			// コースリスト
			$courseViewArray[$course['opYear']]['courseList'][] = $course;
		
		}
		unset($relation);
		
		return array('courseViewArray' => $courseViewArray, 'accountUId' => $accountId);
	}
}
 