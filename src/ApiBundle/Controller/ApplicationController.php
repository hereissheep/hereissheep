<?php

namespace ApiBundle\Controller;

use ApiBundle\Document\Application;
use ApiBundle\Document\User;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

class ApplicationController extends AbstractController implements ClassResourceInterface
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
        $applications = $em->getRepository('ApiBundle:User')->findAll();
        $view = $this->view($applications, 200);

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
        $application = $this->requestToEntity($request, Application::class);
        $application->setToken($this->get('token_builder')->createToken());

        $em = $this->getDoctrine()->getManager();
        $em->persist($application);
        $em->flush();

        $view = $this->view($application, 201);
        return $this->handleView($view);
    }

    /**
     * Recupera um usuario.
     *
     * @param User $user O objeto de boleto
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc(
     *   statusCodes = {
     *     200 = "When a request is completed.",
     *     404 = "When a user is not found."
     *   }
     * )
     */
    public function getAction(User $user)
    {

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
     */
    public function deleteAction(User $user)
    {

    }
}
