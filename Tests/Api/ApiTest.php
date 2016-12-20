<?php

namespace Franjid\ApiWrapperBundle\Tests\Api;

use Franjid\ApiWrapperBundle\Api\Api;
use Franjid\ApiWrapperBundle\Api\ApiRequest;
use Franjid\ApiWrapperBundle\Api\ApiResponseInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

class ApiTest extends \PHPUnit_Framework_TestCase
{
    /** @var ClientInterface $client */
    protected $client;

    /** @var ResponseInterface $response */
    protected $response;

    /** @var Api $api */
    protected $api;

    public function setUp()
    {
        $this->client = $this->prophesize(ClientInterface::class);
        $this->response = $this->prophesize(ResponseInterface::class);

        $this->api = new Api($this->client->reveal());
    }

    public function testSuccessSend()
    {
        $apiRequest = new ApiRequest('GET', '/');
        $this->client
            ->send($apiRequest->getRequest(), $apiRequest->getOptions())
            ->willReturn($this->response);

        $this->assertInstanceOf(ApiResponseInterface::class, $this->api->send($apiRequest));
    }

    /**
     * @expectedException \Franjid\ApiWrapperBundle\Api\ApiException
     */
    public function testFailSend()
    {
        $apiRequest = new ApiRequest('GET', '/');
        $this->client
            ->send($apiRequest->getRequest(), $apiRequest->getOptions())
            ->willThrow(new RequestException('Failed request', $apiRequest->getRequest()));

        $this->api->send($apiRequest);
    }
}
