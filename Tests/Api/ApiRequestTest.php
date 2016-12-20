<?php

namespace Franjid\ApiWrapperBundle\Tests\Api;

use Franjid\ApiWrapperBundle\Api\ApiRequest;
use Franjid\ApiWrapperBundle\Api\ApiRequestInterface;

class ApiRequestTest extends \PHPUnit_Framework_TestCase
{
    const METHOD = 'GET';
    const URI = 'test-uri';

    /** @var ApiRequestInterface apiRequest */
    protected $apiRequest;

    public function setUp()
    {
        $this->apiRequest = new ApiRequest(static::METHOD, static::URI);
    }

    public function testGetMethod()
    {
        $this->assertSame(static::METHOD, $this->apiRequest->getMethod());
    }

    public function testSetMethod()
    {
        $this->apiRequest->setMethod('POST');
        $this->assertSame('POST', $this->apiRequest->getMethod());
    }

    public function testGetHeaders()
    {
        $expectedHeaders = [
            'testHeader1' => [1],
            'testHeader2' => [2],
            'testHeader3' => [3],
        ];

        $this->apiRequest->setHeader('testHeader1', 1);
        $this->apiRequest->setHeaders([
            'testHeader2' => 2,
            'testHeader3' => 3
        ]);

        $this->assertEquals($expectedHeaders, $this->apiRequest->getHeaders());
    }

    public function testGetUri()
    {
        $this->assertSame(static::URI, $this->apiRequest->getUri());
    }

    public function testSetUri()
    {
        $this->apiRequest->setUri('other-test-uri');
        $this->assertSame('other-test-uri', $this->apiRequest->getUri());
    }

    public function testGetBody()
    {
        $testBody = 'some test body';
        $this->apiRequest->setBody($testBody);
        $this->assertSame($testBody, $this->apiRequest->getBody());
    }
}
