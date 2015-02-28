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
     * @param $url
     * @param $method
     * @return mixed
     */
    public function sendApiRequest($url, $method)
    {
        $userJson = $this->getJsonData($url, $method);
        return $this->getSerializer()->deserialize($userJson, User::class, 'json');
    }

}