<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountAttr
 *
 * @ORM\Table(name="Account_Attr")
 * @ORM\Entity
 */
class AccountAttr
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
     * @var \Account
     *
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     * })
     */
    private $account;

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
     * @return AccountAttr
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
     * @return AccountAttr
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
     * @return AccountAttr
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
     * @return AccountAttr
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
     * @return AccountAttr
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
     * @return AccountAttr
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
     * Set accountAttrType
     *
     * @param \eALPS\PortalBundle\Entity\AccountAttrType $accountAttrType
     * @return AccountAttr
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
}