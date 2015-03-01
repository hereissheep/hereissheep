<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use \ApiBundle\Entity\Product;


class ProductController extends Controller
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
        $entity = new Product();
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }
    
    /**
     * @ApiDoc{
     *  statusCodes ={
     *      200 = "Sucess",
     *      404 = "Erro"
     *  }
     * }
     */
    public function updateAction(Request $request)
    {
        $entity = new Product();
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }
    
    /**
     * @ApiDoc{
     *  statusCodes = {
     *      200 = "",
     *      404 = ""
     * }
     * }
     */
    public function viewAction(Request $request)
    {
        $entity = new Product();
        
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
        $entity = new Product();
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
        $entity = new Product();
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
    public function listByCategoryAction(Request $request)
    {
        $entity = new Product();
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }
}
