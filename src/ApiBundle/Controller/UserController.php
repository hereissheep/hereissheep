<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class UserController extends Controller
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
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
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
    public function updateAction(Request $request)
    {
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
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
    public function viewAction(Request $request)
    {
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
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
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
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
    public function listAction(Request $request)
    {
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }
}
