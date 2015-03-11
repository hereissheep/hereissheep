<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController extends FOSRestController
{
    public function getDoctrine()
    {
        return $this->get('doctrine_mongodb');
    }

    public function requestToEntity(Request $request, $entityClassName, $options = [])
    {
        return $this->get('json_entity_encoder')->convert($request->getContent(), $entityClassName, $options);
    }
}
