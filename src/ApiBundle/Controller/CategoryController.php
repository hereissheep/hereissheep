<?php

namespace ApiBundle\Controller;

use ApiBundle\Document\Category;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
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
        $categories = $em->getRepository('ApiBundle:Category')->findAll();
        return new Response($this->get('jms_serializer')->serialize($categories, $request->get('_format')));
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
        $entity = $this->requestToEntity($request, Category::class);

        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();

        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')), Response::HTTP_CREATED);
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
        $entity = new Category();
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
    public function viewAction(Request $request, $id)
    {
        $em = $this->get('doctrine_mongodb')->getManager();
        $category = $em->getRepository('ApiBundle:Category')->find($id);

        return new Response($this->get('jms_serializer')->serialize($category, $request->get('_format')));
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
        $entity = new Category();
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }
}
