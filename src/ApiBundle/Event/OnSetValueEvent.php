<?php

namespace ApiBundle\Event;


use Symfony\Component\EventDispatcher\Event;

class OnSetValueEvent extends Event
{
    protected $field;
    protected $object;
    protected $value;

    public function __construct($field, $object, $value)
    {
        $this->field = $field;
        $this->object = $object;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $field
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}
