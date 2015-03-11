<?php

namespace ApiBundle\Converter;


use ApiBundle\Event\ConverterEvents;
use ApiBundle\Event\OnSetValueEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;

class JsonToEntityConverter
{
    protected $accessor;

    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->accessor = PropertyAccess::createPropertyAccessor();
    }

    public function convert($json, $entityClassName)
    {
        $data = json_decode($json);

        if (!is_object($entityClassName)) {
            $entityClassName = new $entityClassName();
        }

        return $this->handle($data, $entityClassName);
    }

    protected function handle($data, $object)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $this->handle($value, $object);
            } else {
                $this->setParam($object, $key, $value);
            }
        }

        return $object;
    }

    protected function setParam($object, $field, $value)
    {
        $this->accessor->setValue($object, $field, $value);
        $event = new OnSetValueEvent($field, $object, $value);
        $this->dispatcher->dispatch(ConverterEvents::ON_SET_VALUE, $event);
    }
}