<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relation
 *
 * @ORM\Table(name="Relation")
 * @ORM\Entity
 */
class Relation
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
     * @ORM\Column(name="enable", type="boolean", nullable=false)
     */
    private $enable;

    /**
     * @var boolean
     *
     * @ORM\Column(name="closed", type="boolean", nullable=false)
     */
    private $closed;

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
     * @var \Account
     *
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     * })
     */
    private $account;

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
     * Set enable
     *
     * @param boolean $enable
     * @return Relation
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
     * Set closed
     *
     * @param boolean $closed
     * @return Relation
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
    
        return $this;
    }

    /**
     * Get closed
     *
     * @return boolean 
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Set original
     *
     * @param boolean $original
     * @return Relation
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
     * @return Relation
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
     * @return Relation
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
     * @return Relation
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
     * Set account
     *
     * @param \eALPS\PortalBundle\Entity\Account $account
     * @return Relation
     */
    public function setAccount(\eALPS\PortalBundle\Entity\Account $account = null)
    {
        $this->account = $account;
    
        return $this;
    }

    /**
     * Get account
     *
     * @return \eALPS\PortalBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set relationRole
     *
     * @param \eALPS\PortalBundle\Entity\RelationRole $relationRole
     * @return Relation
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