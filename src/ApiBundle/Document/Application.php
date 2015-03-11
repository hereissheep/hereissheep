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
     * @var User
     * @JMS\Serializer\Annotation\Type("ApiBundle\Document\User")
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
    protected $description;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     * @ODM\String
     */
    protected $token;

    /**
     * @JMS\Serializer\Annotation\Type("boolean")
     * @ODM\Boolean
     */
    protected $active = true;

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

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
