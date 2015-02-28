<?php
/**
 * @author Jean <jean.angelis@gmail.com>
 */

namespace AppBundle\Client;

use Guzzle\Http\Client;
use JMS\Serializer\Serializer;

abstract class ApiConsumer implements Consumable
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Serializer
     */
    private $serializer;

    protected function __construct(Serializer $serializer)
    {
        $this->client = new Client();
        $this->serializer = $serializer;
    }

    /**
     * You should pass a valid method like get, post or delete
     *
     * @param string $method
     * @return string|array
     */
    public function getJsonData($url, $method)
    {
        $method = strtolower($method);

        $request = $this->client->$method($url);
        $response = $this->client->send($request);

        return $response->json();
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * @return Serializer
     */
    protected function getSerializer()
    {
        return $this->serializer;
    }
}