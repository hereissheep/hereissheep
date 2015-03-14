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
     *     200 = "When a request is completed.",
     *     404 = "When a category is not found."
     *  }
     * }
     */
    public function getCategoriesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('ApiBundle:Category')->findAll();
        $view = $this->view($categories, Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *     200 = "When a request is completed.",
     *     201 = "When the category is created."
     *  }
     * }
     */
    public function postCategoryAction(Request $request)
    {
        $category = $this->requestToEntity($request, Category::class);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();

        $view = $this->view($category, Response::HTTP_CREATED);
        return $this->handleView($view);
    }

    /**
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *     200 = "When a request is completed.",
     *     404 = "When a category is not found."
     *  }
     * }
     */
    public function putCategoryAction(Request $request)
    {
        $entity = new Category();
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }

    /**
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *     200 = "When a request is completed.",
     *     404 = "When a category is not found."
     *  }
     * }
     */
    public function getCategoryAction(Request $request, Category $category)
    {
        $view = $this->view($category, Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *     204 = "When a request is completed.",
     *     404 = "When a category is not found."
     *  }
     * }
     */
    public function deleteCategoryAction(Request $request, Category $category)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();

        $view = $this->view(null, Response::HTTP_NO_CONTENT);
        return $this->handleView($view);
    }
}
