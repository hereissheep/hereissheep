<?php

namespace ApiBundle\Security;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class ApiKeyUserProvider implements UserProviderInterface
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    public function __construct(ObjectManager $orm)
    {
        $this->manager = $orm;
    }

    public function getUsernameForApiKey($apiKey)
    {
        // Look up the username based on the token in the database, via
        // an API call, or do something entirely different
        $application = $this->manager->getRepository('ApiBundle:Application')
            ->findOneBy([
                'token' => $apiKey
            ]);
        $username = $application->getUser()->getUsername();
        return $username;
    }

    public function loadUserByUsername($username)
    {
        $user = $this->manager->getRepository('ApiBundle:User')
            ->findOneBy([
                'username' => $username
            ]);
        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        // this is used for storing authentication in the session
        // but in this example, the token is sent in each request,
        // so authentication can be stateless. Throwing this exception
        // is proper to make things stateless
        throw new UnsupportedUserException();
    }

    public function supportsClass($class)
    {
        return 'Symfony\Component\Security\Core\User\User' === $class;
    }
}