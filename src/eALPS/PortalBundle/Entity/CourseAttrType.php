<?php

namespace eALPS\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CourseAttrType
 *
 * @ORM\Table(name="Course_Attr_Type")
 * @ORM\Entity
 */
class CourseAttrType
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
     * @ORM\Column(name="caption", type="text", nullable=false)
     */
    private $caption;

    /**
     * @var boolean
     *
     * @ORM\Column(name="multi", type="boolean", nullable=false)
     */
    private $multi;



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
     * @return CourseAttrType
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
     * @return CourseAttrType
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
     * Set multi
     *
     * @param boolean $multi
     * @return CourseAttrType
     */
    public function setMulti($multi)
    {
        $this->multi = $multi;
    
        return $this;
    }

    /**
     * Get multi
     *
     * @return boolean 
     */
    public function getMulti()
    {
        return $this->multi;
    }
}