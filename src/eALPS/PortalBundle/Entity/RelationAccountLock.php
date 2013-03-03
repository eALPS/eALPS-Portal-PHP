<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelationAccountLock
 *
 * @ORM\Table(name="Relation_Account_Lock")
 * @ORM\Entity
 */
class RelationAccountLock
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
     * Set synlock
     *
     * @param boolean $synlock
     * @return RelationAccountLock
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
     * @return RelationAccountLock
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
     * @return RelationAccountLock
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
     * Set account
     *
     * @param \eALPS\PortalBundle\Entity\Account $account
     * @return RelationAccountLock
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
     * @return RelationAccountLock
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