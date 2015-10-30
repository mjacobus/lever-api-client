<?php

namespace LeverTest\Api;

use PHPUnit_Framework_TestCase;
use Lever\Api\Client;

/**
 * LeverTest\Api\ClientTest
 */
class ClientTest extends PHPUnit_Framework_TestCase
{
    /** @var Client */
    protected $client;

    public function setUp()
    {
        $this->client = new Client();
    }

    /**
     * @test
     */
    public function dummyTest()
    {
        $this->assertInstanceOf(Client::class, $this->client);
    }
}
