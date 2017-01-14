<?php

namespace Franjid\ApiWrapperBundle\Api;

use Psr\Http\Message\RequestInterface;

interface ApiRequestInterface
{
    /**
     * @return RequestInterface
     */
    public function getRequest();

    /**
     * @param string $method
     *
     * @return void
     */
    public function setMethod($method);

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    public function setHeader($name, $value);

    /**
     * @param array $headers
     *
     * @return void
     */
    public function setHeaders(array $headers);

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @param string $uri
     *
     * @return void
     */
    public function setUri($uri);

    /**
     * @return string
     */
    public function getUri();

    /**
     * @param string $body
     *
     * @return void
     */
    public function setBody($body);

    /**
     * @return string
     */
    public function getBody();

    /**
     * @param array $options
     *
     * @return void
     */
    public function setOptions(array $options);

    /**
     * @return array
     */
    public function getOptions();
}
