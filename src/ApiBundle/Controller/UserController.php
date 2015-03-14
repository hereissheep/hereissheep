<?php

namespace ApiBundle\Controller;

use ApiBundle\Document\User;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController implements ClassResourceInterface
{
    /**
     * List all users.
     *
     * @return array data
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc(
     *   statusCodes = {
     *     200 = "When a request is completed."
     *   }
     * )
     */
    public function cgetAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('ApiBundle:User')->findAll();

        $view = $this->view($users, Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * Creates a new user.
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc(
     *   statusCodes = {
     *     200 = "When a request is completed.",
     *     201 = "When the user is created."
     *   }
     * )
     */
    public function postAction(Request $request)
    {
        $user = $this->requestToEntity($request, User::class);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        $view = $this->view($user, Response::HTTP_CREATED);
        return $this->handleView($view);
    }

    /**
     * Retrieves an user.
     *
     * @param User $user O objeto de usuário
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc(
     *   statusCodes = {
     *     200 = "When a request is completed.",
     *     404 = "When a user is not found."
     *   }
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAction(User $user)
    {
        $view = $this->view($user, Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * Creates a new user.
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc(
     *   statusCodes = {
     *     200 = "When a request is completed.",
     *     404 = "When a user is not found."
     *   }
     * )
     */
    public function putAction(Request $request, User $user)
    {
        $user = $this->requestToEntity($request, $user);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        $view = $this->view($user, Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * Remove an user.
     *
     * @param User $user O objeto de boleto
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc(
     *   statusCodes = {
     *     200 = "When a request is completed.",
     *     204 = "When the user is deleted.",
     *     404 = "When a user is not found."
     *   }
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        $view = $this->view(null, Response::HTTP_NO_CONTENT);
        return $this->handleView($view);
    }
}
