<?php

/**
 * @author Jean <jean.angelis@gmail.com>
 */

namespace AppBundle\Client;

use ApiBundle\Entity\User;
use JMS\Serializer\Serializer;

class UserConsumer extends ApiConsumer
{
    public function __construct(Serializer $serializer)
    {
        parent::__construct($serializer);
    }

    /**
     * @param integer $id
     * @return User
     */
    public function getUser($id)
    {
        $userJson = $this->handleApi('dev.api.hereissheep.com/user/' . $id, 'get');
        return $this->getSerializer()->deserialize($userJson, User::class, 'json');
    }

    public function saveUser(User $user)
    {
        $userJson = $this->getSerializer()->serialize($user, 'json');
        $this->handleApi('dev.api.hereissheep.com/user/', 'post', $userJson);

        return $user;
    }

}