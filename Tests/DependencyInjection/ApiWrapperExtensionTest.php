<?php

namespace Franjid\ApiWrapperBundle\Tests\DependencyInjection;

use Franjid\ApiWrapperBundle\DependencyInjection\ApiWrapperExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ApiWrapperExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ContainerBuilder
     */
    private $container;

    /**
     * @var ApiWrapperExtension
     */
    private $extension;

    public function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->extension = new ApiWrapperExtension();
    }

    public function testExtension()
    {
        $config = [];
        $this->extension->load($config, $this->container);
    }
}
