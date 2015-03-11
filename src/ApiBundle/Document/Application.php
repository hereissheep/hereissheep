<?php

namespace ApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(collection="applications")
 * @ODM\HasLifecycleCallbacks
 */
class Application
{
    /**
     * @JMS\Serializer\Annotation\Type("string")
     * @ODM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     * @JMS\Serializer\Annotation\Type("ArrayCollection<ApiBundle\Document\User>")
     * @ODM\ReferenceOne(targetDocument="User", inversedBy="applications")
     **/
    protected $user;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     * @ODM\String
     */
    protected $name;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     * @ODM\String
     */
    protected $discription;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     * @ODM\String
     */
    protected $token;

    /**
     * @JMS\Serializer\Annotation\Type("boolean")
     * @ODM\Boolean
     */
    protected $active;

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDiscription()
    {
        return $this->discription;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setDiscription($discription)
    {
        $this->discription = $discription;
        return $this;
    }

    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }
}
