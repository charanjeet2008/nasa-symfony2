<?php

namespace Neo\NasaBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use JsonSerializable;

/**
 * @MongoDB\Document
 */
class Neo implements JsonSerializable
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     * @Assert\Date()
     */
    protected $date;

    /**
     * @MongoDB\Field(type="int")
     * @Assert\Type("int")
     */
    protected $neoReferenceId;

    /**
     * @MongoDB\Field(type="string")
     * @Assert\Type("string")
     */
    protected $name;

    /**
     * @MongoDB\Field(type="float")
     * @Assert\GreaterThan(0)
     */
    protected $speed;

    /**
     * @MongoDB\Field(type="boolean")
     * @Assert\Type("boolean")
     */
    protected $isHazardous;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return string $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set neoReferenceId
     *
     * @param int $neoReferenceId
     * @return $this
     */
    public function setNeoReferenceId($neoReferenceId)
    {
        $this->neoReferenceId = $neoReferenceId;
        return $this;
    }

    /**
     * Get neoReferenceId
     *
     * @return int $neoReferenceId
     */
    public function getNeoReferenceId()
    {
        return $this->neoReferenceId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set speed
     *
     * @param float $speed
     * @return $this
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * Get speed
     *
     * @return float $speed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set isHazardous
     *
     * @param boolean $isHazardous
     * @return $this
     */
    public function setIsHazardous($isHazardous)
    {
        $this->isHazardous = $isHazardous;
        return $this;
    }

    /**
     * Get isHazardous
     *
     * @return boolean $isHazardous
     */
    public function getIsHazardous()
    {
        return $this->isHazardous;
    }

    /**
     * Returns serializable items.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'date' => $this->getDate(),
            'neo_reference_id' => $this->getNeoReferenceId(),
            'name' => $this->getName(),
            'speed' => $this->getSpeed(),
            'is_hazardous' => $this->getIsHazardous()
        ];
    }
}

