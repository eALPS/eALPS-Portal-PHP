<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountAttrLock
 *
 * @ORM\Table(name="Account_Attr_Lock")
 * @ORM\Entity
 */
class AccountAttrLock
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
     * @var \AccountAttrType
     *
     * @ORM\ManyToOne(targetEntity="AccountAttrType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_attr_type_id", referencedColumnName="id")
     * })
     */
    private $accountAttrType;

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
     * @return AccountAttrLock
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
     * @return AccountAttrLock
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
     * @return AccountAttrLock
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
     * Set accountAttrType
     *
     * @param \eALPS\PortalBundle\Entity\AccountAttrType $accountAttrType
     * @return AccountAttrLock
     */
    public function setAccountAttrType(\eALPS\PortalBundle\Entity\AccountAttrType $accountAttrType = null)
    {
        $this->accountAttrType = $accountAttrType;
    
        return $this;
    }

    /**
     * Get accountAttrType
     *
     * @return \eALPS\PortalBundle\Entity\AccountAttrType 
     */
    public function getAccountAttrType()
    {
        return $this->accountAttrType;
    }

    /**
     * Set account
     *
     * @param \eALPS\PortalBundle\Entity\Account $account
     * @return AccountAttrLock
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
}