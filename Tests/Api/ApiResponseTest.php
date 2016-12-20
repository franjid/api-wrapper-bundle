<?php

namespace Franjid\ApiWrapperBundle\Tests\Api;

use Franjid\ApiWrapperBundle\Api\ApiResponse;
use Franjid\ApiWrapperBundle\Api\ApiResponseInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class ApiResponseTest extends \PHPUnit_Framework_TestCase
{
    /** @var ResponseInterface $response */
    protected $response;

    /** @var ApiResponseInterface $apiResponse */
    protected $apiResponse;

    public function setUp()
    {
        $this->response = $this->prophesize(ResponseInterface::class);
        $this->apiResponse = new ApiResponse($this->response->reveal());
    }

    public function testGetStatusCode()
    {
        $expectedValue = 200;
        $this->response->getStatusCode()->willReturn($expectedValue);
        $this->assertSame($expectedValue, $this->apiResponse->getStatusCode());
    }

    public function testGetHeaders()
    {
        $expectedValue = [];
        $this->response->getHeaders()->willReturn($expectedValue);
        $this->assertSame($expectedValue, $this->apiResponse->getHeaders());
    }

    public function testGetHeader()
    {
        $expectedValue = 'application/json';
        $this->response->getHeader('Content-Type')->willReturn([$expectedValue]);
        $this->assertSame($expectedValue, $this->apiResponse->getHeader('Content-Type'));
    }

    public function testGetBody()
    {
        $expectedValue = '{"test": true}';

        /** @var StreamInterface $stream */
        $stream = $this->prophesize(StreamInterface::class);

        $stream->__toString()->willReturn($expectedValue);
        $this->response->getBody()->willReturn($stream->reveal());

        $this->assertSame($expectedValue, $this->apiResponse->getBody());
    }

    public function testIsRedirect()
    {
        $this->response->getStatusCode()->willReturn(301);
        $this->assertTrue($this->apiResponse->isRedirect());
    }
}
