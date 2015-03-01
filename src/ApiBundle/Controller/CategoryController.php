<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use \ApiBundle\Entity\Category;

class CategoryController extends Controller
{
    /**
     * @ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function createAction(Request $request)
    {
        $entity = new Category();
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }
    
    /**
     * @ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function updateAction(Request $request)
    {
        $entity = new Category();
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }
    
    /**
     * @ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function viewAction(Request $request)
    {
        
        $entity = new Category();
        
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }
    
    /**
     * @ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function searchAction(Request $request)
    {
        $entity = new ApiBundle\Entity\Category();
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }
    
    /**
     * @ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function listAction(Request $request)
    {
        $entity = new Category();
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }
}
