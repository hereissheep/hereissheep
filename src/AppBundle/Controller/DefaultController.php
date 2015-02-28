<?php

namespace AppBundle\Controller;

use AppBundle\Client\UserConsumer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = new UserConsumer();
        $user->getData('http://httpbin.org/get', 'get');
        return $this->render('AppBundle:Default:index.html.twig');
    }
}
