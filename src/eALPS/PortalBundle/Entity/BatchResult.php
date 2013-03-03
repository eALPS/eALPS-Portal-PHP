<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BatchResult
 *
 * @ORM\Table(name="Batch_Result")
 * @ORM\Entity
 */
class BatchResult
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
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startedAt", type="datetime", nullable=true)
     */
    private $startedat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finishedAt", type="datetime", nullable=true)
     */
    private $finishedat;

    /**
     * @var string
     *
     * @ORM\Column(name="trigger", type="string", length=255, nullable=true)
     */
    private $trigger;



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
     * Set message
     *
     * @param string $message
     * @return BatchResult
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
     * Set startedat
     *
     * @param \DateTime $startedat
     * @return BatchResult
     */
    public function setStartedat($startedat)
    {
        $this->startedat = $startedat;
    
        return $this;
    }

    /**
     * Get startedat
     *
     * @return \DateTime 
     */
    public function getStartedat()
    {
        return $this->startedat;
    }

    /**
     * Set finishedat
     *
     * @param \DateTime $finishedat
     * @return BatchResult
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
     * Set trigger
     *
     * @param string $trigger
     * @return BatchResult
     */
    public function setTrigger($trigger)
    {
        $this->trigger = $trigger;
    
        return $this;
    }

    /**
     * Get trigger
     *
     * @return string 
     */
    public function getTrigger()
    {
        return $this->trigger;
    }
}