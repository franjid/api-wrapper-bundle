<?php

namespace Franjid\ApiWrapperBundle\Tests\Api;

use Franjid\ApiWrapperBundle\Api\ApiClientFactory;
use GuzzleHttp\Client;

class ApiClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var ApiClientFactory $apiClientFactory */
    protected $apiClientFactory;

    public function setUp()
    {
        $this->apiClientFactory = new ApiClientFactory();
    }

    public function testCreateApiClient()
    {
        $testBaseUri = 'test-base-uri';
        $expectedClient = new Client([
            'base_uri' => $testBaseUri,
        ]);

        $this->assertEquals($expectedClient, $this->apiClientFactory->createApiClient($testBaseUri));
    }

    public function testGetBaseUriWithBaseUriAsString()
    {
        $this->assertSame('api-url', $this->apiClientFactory->getBaseUri('api-url'));
    }

    public function testGetBaseUriWithBaseUriAsArrayWithOneElement()
    {
        $apiEndpoints = ['api-url-1'];

        $this->assertSame($apiEndpoints[0], $this->apiClientFactory->getBaseUri($apiEndpoints));
    }

    public function testGetBaseUriWithBaseUriAsArraywithMultipleElements()
    {
        $apiEndpoints = [
            'api-url-1',
            'api-url-2',
            'api-url-3',
        ];

        $this->assertContains($this->apiClientFactory->getBaseUri($apiEndpoints), $apiEndpoints);
    }
}
