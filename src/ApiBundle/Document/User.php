<?php

namespace ApiBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
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
     * @var ArrayCollection
     * @ODM\ReferenceMany(targetDocument="Product", mappedBy="user", cascade={"persist"})
     **/
    protected $products;

    /**
     * @var ArrayCollection
     * @ODM\ReferenceMany(targetDocument="Application", mappedBy="user", cascade={"persist"})
     **/
    protected $applications;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->applications = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ArrayCollection $products
     * @return $this
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getApplications()
    {
        return $this->applications;
    }

    /**
     * @param ArrayCollection $applications
     * @return $this
     */
    public function setApplications($applications)
    {
        $this->applications = $applications;
        return $this;
    }

    public function addProduct(Product $product)
    {
        $product->setUser($this);
        $this->products->add($product);
        return $this;
    }

    public function removeProduct(Product $product)
    {
        $this->products->remove($product);
        return $this;
    }

    public function addApplication(Application $application)
    {
        $application->setUser($this);
        $this->applications->add($application);
        return $this;
    }

    public function removeApplication(Application $application)
    {
        $this->applications->remove($application);
        return $this;
    }
}
