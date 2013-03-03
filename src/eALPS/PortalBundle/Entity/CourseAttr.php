<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CourseAttr
 *
 * @ORM\Table(name="Course_Attr")
 * @ORM\Entity
 */
class CourseAttr
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
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable", type="boolean", nullable=false)
     */
    private $enable;

    /**
     * @var boolean
     *
     * @ORM\Column(name="original", type="boolean", nullable=false)
     */
    private $original;

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
     * Set value
     *
     * @param string $value
     * @return CourseAttr
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set enable
     *
     * @param boolean $enable
     * @return CourseAttr
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
    
        return $this;
    }

    /**
     * Get enable
     *
     * @return boolean 
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * Set original
     *
     * @param boolean $original
     * @return CourseAttr
     */
    public function setOriginal($original)
    {
        $this->original = $original;
    
        return $this;
    }

    /**
     * Get original
     *
     * @return boolean 
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return CourseAttr
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
     * @return CourseAttr
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
     * @return CourseAttr
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
     * @return CourseAttr
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