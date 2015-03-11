<?php

namespace ApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ODM\EmbeddedDocument
 * @ODM\HasLifecycleCallbacks
 */
class Location
{

    /**
     * @JMS\Serializer\Annotation\Type("string")
     * @ODM\Id
     */
    protected $id;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     * @ODM\String
     */
    protected $address;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     * @ODM\String
     */
    protected $latitude;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     * @ODM\String
     */
    protected $longitude;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}