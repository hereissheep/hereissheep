<?php

namespace AppBundle\Controller;

use AppBundle\Client\UserConsumer;
use AppBundle\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = new UserConsumer($this->get('jms_serializer'));
        $user->sendApiRequest('http://httpbin.org/get', 'get');

        return $this->render('AppBundle:Default:index.html.twig', [
            'search_form' => $this->getSearchForm()->createView()
        ]);
    }

    protected function getSearchForm()
    {
        return $this->createForm(new SearchType());
    }
}
