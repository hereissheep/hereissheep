<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends AbstractController
{
    public function indexAction($name)
    {
        return $this->render('ApiBundle:Default:index.html.twig', array('name' => $name));
    }
}
