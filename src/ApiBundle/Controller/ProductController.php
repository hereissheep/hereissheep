<?php

namespace ApiBundle\Controller;

use ApiBundle\Document\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductController extends AbstractController
{

    /**
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('ApiBundle:Product')->findAll();
        return new Response($this->get('jms_serializer')->serialize($products, $request->get('_format')));
    }

    /**
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function createAction(Request $request)
    {
        $entity = $this->requestToEntity($request, Product::class);

        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('ApiBundle:Category')->find($entity->getCategory());
        $entity->setCategory($category);

        $em->persist($entity);
        $em->flush();

        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }

    /**
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function updateAction(Request $request)
    {
        $entity = new Product();
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }

    /**
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function viewAction(Request $request)
    {
        $entity = new Product();

        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }

    /**
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
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
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
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
