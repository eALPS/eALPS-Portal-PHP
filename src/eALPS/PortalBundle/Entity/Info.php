<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Info
 *
 * @ORM\Table(name="info")
 * @ORM\Entity
 */
class Info
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=true)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="title", type="text", nullable=true)
	 */
	private $title;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="body", type="text", nullable=true)
	 */
	private $body;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="importance", type="text", nullable=true)
	 */
	private $importance;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="address", type="text", nullable=true)
	 */
	private $address;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="insertdate", type="text", nullable=true)
	 */
	private $insertdate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="updatedate", type="text", nullable=true)
	 */
	private $updatedate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="deletedate", type="text", nullable=true)
	 */
	private $deletedate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="term", type="text", nullable=true)
	 */
	private $term;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="availability", type="boolean", nullable=false)
	 */
	private $availability;


	/**
	 * Set id
	 *
	 * @param integer $id
	 * @return Info
	 */
	public function setId($id)
	{
		$this->id = $id;
	
		return $this;
	}

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
	 * Set title
	 *
	 * @param string $title
	 * @return Info
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	
		return $this;
	}

	/**
	 * Get title
	 *
	 * @return string 
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Set body
	 *
	 * @param string $body
	 * @return Info
	 */
	public function setBody($body)
	{
		$this->body = $body;
	
		return $this;
	}

	/**
	 * Get body
	 *
	 * @return string 
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Set importance
	 *
	 * @param string $importance
	 * @return Info
	 */
	public function setImportance($importance)
	{
		$this->importance = $importance;
	
		return $this;
	}

	/**
	 * Get importance
	 *
	 * @return string 
	 */
	public function getImportance()
	{
		return $this->importance;
	}

	/**
	 * Set address
	 *
	 * @param string $address
	 * @return Info
	 */
	public function setAddress($address)
	{
		$this->address = $address;
	
		return $this;
	}

	/**
	 * Get address
	 *
	 * @return string 
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Set insertdate
	 *
	 * @param \DateTime $insertdate
	 * @return Info
	 */
	public function setInsertdate($insertdate)
	{
		$this->insertdate = $insertdate;
	
		return $this;
	}

	/**
	 * Get insertdate
	 *
	 * @return \DateTime 
	 */
	public function getInsertdate()
	{
		return $this->insertdate;
	}
	
	/**
	 * Get updatedate
	 *
	 * @return \DateTime 
	 */
	public function getInsertdateDatetime()
	{
		if($this->insertdate != 0) {
			return strftime('%Y.%m.%d', ($this->insertdate - 2440587.5)*86400.0);
		} else {
			return "";
		}
	}

	/**
	 * Set updatedate
	 *
	 * @param \DateTime $updatedate
	 * @return Info
	 */
	public function setUpdatedate($updatedate)
	{
		$this->updatedate = $updatedate;
	
		return $this;
	}

	/**
	 * Get updatedate
	 *
	 * @return \DateTime 
	 */
	public function getUpdatedate()
	{
		return $this->updatedate;
	}
	
	/**
	 * Get updatedate
	 *
	 * @return \DateTime 
	 */
	public function getUpdatedateDatetime()
	{
		if($this->updatedate != 0) {
			return strftime('%Y.%m.%d', ($this->updatedate - 2440587.5)*86400.0);
		} else {
			return "";
		}
	}

	/**
	 * Set deletedate
	 *
	 * @param \DateTime $deletedate
	 * @return Info
	 */
	public function setDeletedate($deletedate)
	{
		$this->deletedate = $deletedate;
	
		return $this;
	}

	/**
	 * Get deletedate
	 *
	 * @return \DateTime 
	 */
	public function getDeletedate()
	{
		return $this->deletedate;
	}
	
	/**
	 * Get updatedate
	 *
	 * @return \DateTime 
	 */
	public function getDeletedateDatetime()
	{
		if($this->deletedate != 0) {
			return strftime('%Y.%m.%d', ($this->deletedate - 2440587.5)*86400.0);
		} else {
			return "";
		}
	}

	/**
	 * Set term
	 *
	 * @param \DateTime $term
	 * @return Info
	 */
	public function setTerm($term)
	{
		$this->term = $term;
	
		return $this;
	}

	/**
	 * Get term
	 *
	 * @return \DateTime 
	 */
	public function getTerm()
	{
		return $this->term;
	}

	/**
	 * Set availability
	 *
	 * @param boolean $availability
	 * @return Info
	 */
	public function setAvailability($availability)
	{
		$this->availability = $availability;
	
		return $this;
	}

	/**
	 * Get availability
	 *
	 * @return boolean 
	 */
	public function getAvailability()
	{
		return $this->availability;
	}
	
	/**
	 * getLabelType function.
	 * 日本語のラベルタイプからCSS用のラベルタイプを取得する．
	 * 
	 * @access public
	 * @param string $jpLabelType, 日本語ラベルタイプ(ex null，''，通知，重要，...)
	 * @return string, label-type
	 */
	function getLabelType() {
		
		$jpLabelType = $this->importance;
		$labelType = '';
		
		if($jpLabelType == null || $jpLabelType == '') {
			$labelType = 'label';
		} else if($jpLabelType == '通 知') {
			$labelType = 'label label-info';
		} else if($jpLabelType == '重 要') {
			$labelType = 'label label-important';
		} else if($jpLabelType == '警 告') {
			$labelType = 'label label-warning';
		} else if($jpLabelType == '成 功') {
			$labelType = 'label label-success';
		}
		return $labelType;
		
	}
}