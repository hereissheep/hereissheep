<?php
/**
 * @author Jean <jean.angelis@gmail.com>
 */

namespace AppBundle\Client;

use Guzzle\Http\Client;

abstract class ApiConsumer implements Consumable
{
    /**
     * @var
     */
    private $client;

    protected function __construct()
    {
        $this->client = new Client();
    }

    public function getData($method)
    {

    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }
}