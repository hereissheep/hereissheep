<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     * }
     */
    public function indexAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        return $this->get('jms_serializer')->serialize($entity, $request->getFormat('_format'));
    }
}
