<?php

namespace AppBundle\Controller;

use AppBundle\Client\UserConsumer;
use AppBundle\Form\SearchType;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = new UserConsumer($this->get('jms_serializer'));
        $user->getUser(1);

        return $this->render('AppBundle:Default:index.html.twig', [
            'search_form' => $this->getSearchForm()->createView(),
            'signup_form' => $this->getSignupForm()->createView()
        ]);
    }

    protected function getSearchForm()
    {
        return $this->createForm(new SearchType());
    }

    protected function getSignupForm()
    {
        return $this
            ->createForm(new UserType())
            ->add('Signup', 'submit', [
                'class' => 'btn btn-success'
            ]);
        return $this->render('AppBundle:Default:index.html.twig');
    }
}
