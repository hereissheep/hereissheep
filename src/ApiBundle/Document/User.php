<?php

namespace ApiBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @MongoDB\Document
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * Encrypted password. Must be persisted.
     * @JMS\Serializer\Annotation\Exclude
     * @var string
     */
    protected $password;

    /**
     * @var ArrayCollection
     * @JMS\Serializer\Annotation\Type("ArrayCollection<Product>")
     * @ODM\ReferenceMany(targetDocument="Product", mappedBy="user")
     **/
    protected $products;

    /**
     * @var ArrayCollection
     * @JMS\Serializer\Annotation\Type("ArrayCollection<Application>")
     * @ODM\ReferenceMany(targetDocument="Application", mappedBy="user")
     **/
    protected $applications;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->applications = new ArrayCollection();
    }
}
