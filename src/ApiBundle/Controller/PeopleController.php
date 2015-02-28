<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PeopleController extends Controller
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
    public function createAction(Request $request)
    {
        return $this->get('jms_serializer')->serialize($entity, $request->getFormat('_format'));
    }
    
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
    public function searchAction(Request $request)
    {
        return $this->get('jms_serializer')->serialize($entity, $request->getFormat('_format'));
    }
    
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
    public function listAllAction(Request $request)
    {
        return $this->get('jms_serializer')->serialize($entity, $request->getFormat('_format'));
    }
}
