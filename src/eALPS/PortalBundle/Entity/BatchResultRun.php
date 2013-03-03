<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BatchResultRun
 *
 * @ORM\Table(name="Batch_Result_Run")
 * @ORM\Entity
 */
class BatchResultRun
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
     * @ORM\Column(name="operation", type="string", length=255, nullable=false)
     */
    private $operation;

    /**
     * @var string
     *
     * @ORM\Column(name="table_name", type="string", length=255, nullable=false)
     */
    private $tableName;

    /**
     * @var integer
     *
     * @ORM\Column(name="data_id", type="integer", nullable=true)
     */
    private $dataId;

    /**
     * @var string
     *
     * @ORM\Column(name="fields", type="string", length=255, nullable=true)
     */
    private $fields;

    /**
     * @var string
     *
     * @ORM\Column(name="new_values", type="string", length=255, nullable=true)
     */
    private $newValues;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finishedAt", type="datetime", nullable=true)
     */
    private $finishedat;

    /**
     * @var \BatchResult
     *
     * @ORM\ManyToOne(targetEntity="BatchResult")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="batch_result_id", referencedColumnName="id")
     * })
     */
    private $batchResult;



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
     * Set operation
     *
     * @param string $operation
     * @return BatchResultRun
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
    
        return $this;
    }

    /**
     * Get operation
     *
     * @return string 
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set tableName
     *
     * @param string $tableName
     * @return BatchResultRun
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    
        return $this;
    }

    /**
     * Get tableName
     *
     * @return string 
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Set dataId
     *
     * @param integer $dataId
     * @return BatchResultRun
     */
    public function setDataId($dataId)
    {
        $this->dataId = $dataId;
    
        return $this;
    }

    /**
     * Get dataId
     *
     * @return integer 
     */
    public function getDataId()
    {
        return $this->dataId;
    }

    /**
     * Set fields
     *
     * @param string $fields
     * @return BatchResultRun
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    
        return $this;
    }

    /**
     * Get fields
     *
     * @return string 
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Set newValues
     *
     * @param string $newValues
     * @return BatchResultRun
     */
    public function setNewValues($newValues)
    {
        $this->newValues = $newValues;
    
        return $this;
    }

    /**
     * Get newValues
     *
     * @return string 
     */
    public function getNewValues()
    {
        return $this->newValues;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return BatchResultRun
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return BatchResultRun
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set finishedat
     *
     * @param \DateTime $finishedat
     * @return BatchResultRun
     */
    public function setFinishedat($finishedat)
    {
        $this->finishedat = $finishedat;
    
        return $this;
    }

    /**
     * Get finishedat
     *
     * @return \DateTime 
     */
    public function getFinishedat()
    {
        return $this->finishedat;
    }

    /**
     * Set batchResult
     *
     * @param \eALPS\PortalBundle\Entity\BatchResult $batchResult
     * @return BatchResultRun
     */
    public function setBatchResult(\eALPS\PortalBundle\Entity\BatchResult $batchResult = null)
    {
        $this->batchResult = $batchResult;
    
        return $this;
    }

    /**
     * Get batchResult
     *
     * @return \eALPS\PortalBundle\Entity\BatchResult 
     */
    public function getBatchResult()
    {
        return $this->batchResult;
    }
}