<?php

namespace LeverTest\Api;

use GuzzleHttp\Client as HttpClient;
use Lever\Api\Client;
use PHPUnit_Framework_TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * LeverTest\Api\ClientTest
 */
class ClientTest extends PHPUnit_Framework_TestCase
{
    /** @var Client */
    protected $client;

    /** @var HttpClient | \Prophecy\Prophecy\ObjectProphecy */
    protected $mockClient;

    public function setUp()
    {
        $this->client = new Client(
            [
                'authToken'  => 'myToken',
                'httpClient' => $this->mockClient()->reveal(),
            ]
        );
    }

    /**
     * @test
     */
    public function hasDefaultEndpoint()
    {
        $this->assertEquals('https://api.lever.co/v1', $this->client->getEndpoint());
    }

    /**
     * @test
     */
    public function canMutateEndpoint()
    {
        $this->client = new Client(['endpoint' => 'https://test.lever.co/v2/']);
        $this->assertEquals('https://test.lever.co/v2', $this->client->getEndpoint());
    }

    /**
     * @test
     */
    public function canMakeGetRequests()
    {
        $query = ['foo' => 'bar'];

        $this->mockClient()->request(
            'GET',
            $this->url('/foo'),
            [
                'auth'  => ['myToken', ''],
                'query' => $query,
            ]
        )->willReturn($this->fooBarResponse());

        $data = $this->client->get('/foo', $query);

        $this->assertFooBarResponse($data);
    }

    /**
     * @test
     */
    public function canMakePostRequests()
    {
        $postData = ['foo' => 'bar'];

        $this->mockClient()->request(
            'POST',
            $this->url('/foo'),
            [
                'auth'        => ['myToken', ''],
                'form_params' => $postData,
            ]
        )->willReturn($this->fooBarResponse());

        $data = $this->client->post('/foo', $postData);

        $this->assertFooBarResponse($data);
    }

    /**
     * @test
     */
    public function canMakePutRequest()
    {
        $putData = ['foo' => 'bar'];

        $this->mockClient()->request(
            'PUT',
            $this->url('/foo'),
            [
                'auth' => ['myToken', ''],
                'json' => $putData,
            ]
        )->willReturn($this->fooBarResponse());

        $data = $this->client->put('/foo', $putData);

        $this->assertFooBarResponse($data);
    }

    /**
     * @return \Prophecy\Prophecy\ObjectProphecy
     */
    private function mockClient()
    {
        if ($this->mockClient === null) {
            $this->mockClient = $this->prophesize(HttpClient::class);
        }

        return $this->mockClient;
    }

    /**
     * @param string $path
     *
     * @return string
     */
    private function url($path = '/')
    {
        return 'https://api.lever.co/v1' . $path;
    }

    private function fooBarResponse()
    {
        $response = $this->prophesize(ResponseInterface::class);
        $response->getBody()->willReturn('{"foo":"bar"}');
        return $response->reveal();
    }

    /**
     * @param array $data
     */
    private function assertFooBarResponse($data)
    {
        $this->assertEquals(['foo' => 'bar'], $data);
    }
}
