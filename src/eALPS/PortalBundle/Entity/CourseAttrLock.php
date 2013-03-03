<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CourseAttrLock
 *
 * @ORM\Table(name="Course_Attr_Lock")
 * @ORM\Entity
 */
class CourseAttrLock
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="synlock", type="boolean", nullable=false)
     */
    private $synlock;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
     */
    private $updatedat;

    /**
     * @var \Course
     *
     * @ORM\ManyToOne(targetEntity="Course")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     * })
     */
    private $course;

    /**
     * @var \CourseAttrType
     *
     * @ORM\ManyToOne(targetEntity="CourseAttrType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course_attr_type_id", referencedColumnName="id")
     * })
     */
    private $courseAttrType;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set synlock
     *
     * @param boolean $synlock
     * @return CourseAttrLock
     */
    public function setSynlock($synlock)
    {
        $this->synlock = $synlock;
    
        return $this;
    }

    /**
     * Get synlock
     *
     * @return boolean 
     */
    public function getSynlock()
    {
        return $this->synlock;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return CourseAttrLock
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;
    
        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime 
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set updatedat
     *
     * @param \DateTime $updatedat
     * @return CourseAttrLock
     */
    public function setUpdatedat($updatedat)
    {
        $this->updatedat = $updatedat;
    
        return $this;
    }

    /**
     * Get updatedat
     *
     * @return \DateTime 
     */
    public function getUpdatedat()
    {
        return $this->updatedat;
    }

    /**
     * Set course
     *
     * @param \eALPS\PortalBundle\Entity\Course $course
     * @return CourseAttrLock
     */
    public function setCourse(\eALPS\PortalBundle\Entity\Course $course = null)
    {
        $this->course = $course;
    
        return $this;
    }

    /**
     * Get course
     *
     * @return \eALPS\PortalBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set courseAttrType
     *
     * @param \eALPS\PortalBundle\Entity\CourseAttrType $courseAttrType
     * @return CourseAttrLock
     */
    public function setCourseAttrType(\eALPS\PortalBundle\Entity\CourseAttrType $courseAttrType = null)
    {
        $this->courseAttrType = $courseAttrType;
    
        return $this;
    }

    /**
     * Get courseAttrType
     *
     * @return \eALPS\PortalBundle\Entity\CourseAttrType 
     */
    public function getCourseAttrType()
    {
        return $this->courseAttrType;
    }
}