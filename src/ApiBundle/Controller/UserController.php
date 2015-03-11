<?php

namespace ApiBundle\Controller;

use ApiBundle\Document\User;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController implements ClassResourceInterface
{
    /**
     * Lista todos os usuarios.
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

        $view = $this->view($users, 200);
        return $this->handleView($view);
    }

    /**
     * Cria um novo usuario.
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

        $view = $this->view($user, 201);
        return $this->handleView($view);
    }

    /**
     * Recupera um usuario.
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
        $view = $this->view($user, 200);
        return $this->handleView($view);
    }

    /**
     * Exclui um usuario do sistema.
     *
     * @param User $user O objeto de boleto
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc(
     *   statusCodes = {
     *     200 = "When a request is completed.",
     *     201 = "When the user is deleted.",
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

        $view = $this->view($user, 201);
        return $this->handleView($view);
    }
}
