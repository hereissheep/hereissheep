<?php
/**
 * @author Jean <jean.angelis@gmail.com>
 */

namespace AppBundle\Client;


interface Consumable
{
    public function getJsonData($url, $method);
}