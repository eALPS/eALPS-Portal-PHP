<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelationRole
 *
 * @ORM\Table(name="Relation_Role")
 * @ORM\Entity
 */
class RelationRole
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="caption", type="string", length=255, nullable=false)
     */
    private $caption;

    /**
     * @var string
     *
     * @ORM\Column(name="moodleName", type="string", length=255, nullable=false)
     */
    private $moodlename;



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
     * Set name
     *
     * @param string $name
     * @return RelationRole
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set caption
     *
     * @param string $caption
     * @return RelationRole
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    
        return $this;
    }

    /**
     * Get caption
     *
     * @return string 
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set moodlename
     *
     * @param string $moodlename
     * @return RelationRole
     */
    public function setMoodlename($moodlename)
    {
        $this->moodlename = $moodlename;
    
        return $this;
    }

    /**
     * Get moodlename
     *
     * @return string 
     */
    public function getMoodlename()
    {
        return $this->moodlename;
    }
}