<?php

namespace ApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ODM\Document(collection="products")
 * @ODM\HasLifecycleCallbacks
 * @ODM\Index(keys={"location"="2d"})
 */
class Product
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
    protected $description;

    /**
     * @var Category
     * @JMS\Serializer\Annotation\Type("string")
     * @ODM\ReferenceOne(targetDocument="Category", inversedBy="products")
     */
    protected $category;

    /**
     * @var User
     * @JMS\Serializer\Annotation\Type("ApiBundle\Document\User")
     * @ODM\ReferenceOne(targetDocument="User", inversedBy="products")
     **/
    protected $user;

    /**
     * @JMS\Serializer\Annotation\Type("ApiBundle\Document\Location")
     * @ODM\EmbedOne(targetDocument="Location")
     */
    protected $location;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     * @ODM\Distance
     */
    protected $distance;

    /**
     * @JMS\Serializer\Annotation\Type("DateTime")
     * @ODM\Date
     */
    protected $createdAt;

    /**
     * @JMS\Serializer\Annotation\Type("float")
     * @ODM\Float
     */
    protected $price;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     * @return $this
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param mixed $distance
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
        return $this;
    }
}
