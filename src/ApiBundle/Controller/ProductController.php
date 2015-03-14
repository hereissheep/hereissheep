<?php

namespace ApiBundle\Controller;

use ApiBundle\Document\Category;
use ApiBundle\Document\Product;
use ApiBundle\Document\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductController extends AbstractController
{

    /**
     * List all products.
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function getProductsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('ApiBundle:Product')->findAll();

        $view = $this->view($products, Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * Creates a new product.
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function postProductAction(Request $request)
    {
        $product = $this->requestToEntity($request, Product::class);

        $em = $this->getDoctrine()->getManager();
        $product->setUser($this->getUser());

        $em->persist($product);
        $em->flush();

        $view = $this->view($product, Response::HTTP_CREATED);
        return $this->handleView($view);
    }

    /**
     * Updates a product.
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function putProductAction(Request $request, Product $product)
    {
        $entity = new Product();
        return new Response($this->get('jms_serializer')->serialize($entity, $request->get('_format')));
    }

    /**
     * Gets a product.
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function getProductAction(Request $request, Product $product)
    {
        $view = $this->view($product, Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * Gets a product by category.
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     */
    public function getCategoryProductsAction(Category $category, Request $request)
    {
        $view = $this->view($category->getProducts(), Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * Gets a product by user.
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *      200 = "",
     *      404 = ""
     *  }
     * }
     * @param Request $request
     * @param \ApiBundle\Document\User $user
     * @return Response
     */
    public function getUserProductsAction(Request $request, User $user)
    {
        $view = $this->view($user->getProducts(), Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc{
     *  statusCodes ={
     *     204 = "When a request is completed.",
     *     404 = "When a product is not found."
     *  }
     * }
     */
    public function deleteProductAction(Request $request, Product $product)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();

        $view = $this->view(null, Response::HTTP_NO_CONTENT);
        return $this->handleView($view);
    }
}
