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
     * @return ApiRequest
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
     * @return ApiRequest
     */
    public function setHeader($name, $value);

    /**
     * @param array $headers
     *
     * @return ApiRequest
     */
    public function setHeaders(array $headers);

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @param string $uri
     *
     * @return ApiRequest
     */
    public function setUri($uri);

    /**
     * @return string
     */
    public function getUri();

    /**
     * @param string $body
     */
    public function setBody($body);

    /**
     * @return string
     */
    public function getBody();

    /**
     * @param array $options
     */
    public function setOptions(array $options);

    /**
     * @return array
     */
    public function getOptions();
}
