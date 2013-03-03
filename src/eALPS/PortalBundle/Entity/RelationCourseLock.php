<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelationCourseLock
 *
 * @ORM\Table(name="Relation_Course_Lock")
 * @ORM\Entity
 */
class RelationCourseLock
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
     * @var \RelationRole
     *
     * @ORM\ManyToOne(targetEntity="RelationRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relation_role_id", referencedColumnName="id")
     * })
     */
    private $relationRole;



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
     * @return RelationCourseLock
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
     * @return RelationCourseLock
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
     * @return RelationCourseLock
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
     * @return RelationCourseLock
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
     * Set relationRole
     *
     * @param \eALPS\PortalBundle\Entity\RelationRole $relationRole
     * @return RelationCourseLock
     */
    public function setRelationRole(\eALPS\PortalBundle\Entity\RelationRole $relationRole = null)
    {
        $this->relationRole = $relationRole;
    
        return $this;
    }

    /**
     * Get relationRole
     *
     * @return \eALPS\PortalBundle\Entity\RelationRole 
     */
    public function getRelationRole()
    {
        return $this->relationRole;
    }
}