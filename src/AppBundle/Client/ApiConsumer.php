<?php
/**
 * @author Jean <jean.angelis@gmail.com>
 */

namespace AppBundle\Client;

use GuzzleHttp\Client;
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
    public function handleApi($url, $method, $data = null)
    {
        $method = strtolower($method);

        if (!in_array($method, $this->getValidMethods())) {
            throw new \BadMethodCallException('Attempted to call invalid method: ' . $method);
        }

        $response = $this->client->$method($url, [
            'headers' => ['content-type' => 'application/json']
        ]);

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

    private function getValidMethods()
    {
        return [
            'get', 'post', 'delete', 'put'
        ];
    }
}