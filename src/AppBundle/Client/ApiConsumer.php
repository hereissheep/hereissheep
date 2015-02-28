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

    /**
     * You should pass a valid method like get, post or delete
     *
     * @param string $method
     */
    public function getData($url, $method)
    {
        $method = strtolower($method);

        $request = $this->client->$method($url);
        $response = $this->client->send($request);
        dump($response->json());exit;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }
}