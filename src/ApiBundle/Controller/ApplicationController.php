<?php

namespace ApiBundle\Controller;

use ApiBundle\Document\Application;
use ApiBundle\Document\User;
use Symfony\Component\HttpFoundation\Request;

class ApplicationController extends AbstractController
{
    /**
     * Lista todos os usuarios.
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc(
     *   statusCodes = {
     *     200 = "When a request is completed."
     *   }
     * )
     */
    public function getApplicationsAction(User $user)
    {
        $applications = $user->getApplications();
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
    public function postApplicationAction(User $user, Request $request)
    {
        $application = $this->requestToEntity($request, Application::class);
        $application
            ->setToken($this->get('token_builder')->createToken());

        $user->addApplication($application);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAction(Application $application)
    {
        $view = $this->view($application, 200);
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
    public function deleteAction(User $user, Application $application)
    {
        $user->removeApplication($application);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        $view = $this->view($application, 201);
        return $this->handleView($view);
    }
}
