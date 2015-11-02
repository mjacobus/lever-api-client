<?php

namespace Lever\Api;

use GuzzleHttp\Client as HttpClient;

class Client
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var string
     */
    private $endpoint = 'https://api.lever.co/v1';

    /**
     * @var string
     */
    private $authToken;

    /**
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        if (isset($options['endpoint'])) {
            $this->endpoint = trim($options['endpoint'], '/');
        }

        if (isset($options['authToken'])) {
            $this->authToken = $options['authToken'];
        }

        if (isset($options['httpClient'])) {
            $this->httpClient = $options['httpClient'];
        } else {
            $this->httpClient = new HttpClient();
        }
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param string $path
     * @param array  $params
     *
     * @return array
     */
    public function get($path, array $params = [])
    {
        return $this->request('GET', $path, ['query' => $params]);
    }

    /**
     * @param string $path
     * @param array  $postData
     *
     * @return array
     */
    public function post($path, $postData)
    {
        return $this->request('POST', $path, ['form_params' => $postData]);
    }

    /**
     * @param string $path
     * @param array  $putData
     *
     * @return array
     */
    public function put($path, $putData)
    {
        return $this->request('PUT', $path, ['json' => $putData]);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array  $options
     *
     * @return array
     */
    private function request($method, $path, $options)
    {
        $uri = $this->endpoint . $path;

        $authOption = ['auth' => [$this->authToken, '']];
        $options = array_merge($options, $authOption);

        $response = $this->httpClient->request($method, $uri, $options);

        return json_decode($response->getBody(), true);
    }
}
