<?php

namespace ApiBundle\Controller;

use ApiBundle\Document\Application;
use ApiBundle\Document\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends AbstractController
{
    /**
     * List all user's applications.
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
        $view = $this->view($applications, Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * Creates an applications for a user.
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc(
     *   statusCodes = {
     *     200 = "When a request is completed.",
     *     201 = "When the user is created."
     *   }
     * )
     */
    public function postApplicationAction(Request $request, User $user)
    {
        $application = $this->requestToEntity($request, Application::class);
        $application
            ->setToken($this->get('token_builder')->createToken());

        $user->addApplication($application);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        $view = $this->view($application, Response::HTTP_CREATED);
        return $this->handleView($view);
    }

    /**
     * Creates an applications for a user.
     *
     * @Nelmio\ApiDocBundle\Annotation\ApiDoc(
     *   statusCodes = {
     *     200 = "When a request is completed.",
     *     201 = "When the user is created."
     *   }
     * )
     */
    public function putApplicationAction(Request $request, User $user, Application $application)
    {
        $application = $this->requestToEntity($request, $application);
        $em = $this->getDoctrine()->getManager();
        $em->persist($application);
        $em->flush();

        $view = $this->view($application, Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * Retrieves an user's application.
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
    public function getApplicationAction(Application $application)
    {
        $view = $this->view($application, Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * Removes an user's application.
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
    public function deleteApplicationAction(User $user, Application $application)
    {
        $user->removeApplication($application);

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        $view = $this->view(null, Response::HTTP_NO_CONTENT);
        return $this->handleView($view);
    }
}
