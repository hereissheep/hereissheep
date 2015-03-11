<?php

namespace ApiBundle\EventListener;


use ApiBundle\Event\ConverterEvents;
use ApiBundle\Event\OnSetValueEvent;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class ConverterSubscriber implements EventSubscriberInterface
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var EncoderFactoryInterface
     */
    protected $encoderFactory;

    public function __construct(ObjectManager $manager, EncoderFactoryInterface $encoderFactory)
    {
        $this->manager = $manager;
        $this->encoderFactory = $encoderFactory;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     *
     * @api
     */
    public static function getSubscribedEvents()
    {
        return array(
            ConverterEvents::ON_SET_VALUE => array('onSetValue', 0),
        );
    }

    public function onSetValue(OnSetValueEvent $event)
    {
        $object = $event->getObject();
        switch ($event->getField()) {
            case 'category':
                $category = $this->manager->getRepository('ApiBundle:Category')->find($event->getValue());
                $object->setCategory($category);
                break;
            case 'password':
                $encoder = $this->encoderFactory->getEncoder($object);
                $password = $encoder->encodePassword($object->getPassword(), $object->getSalt());
                $object->setPassword($password);
                break;
        }
        $event->setObject($object);
    }
}