<?php

namespace ApiBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ODM\Document(collection="categories")
 * @ODM\HasLifecycleCallbacks
 */
class Category
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
     * @var ArrayCollection
     * @JMS\Serializer\Annotation\Type("ArrayCollection<Product>")
     * @ODM\ReferenceMany(targetDocument="Product", mappedBy="category")
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

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
}
