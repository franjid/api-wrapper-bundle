<?php

namespace Franjid\ApiWrapperBundle\Api;

use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\RequestOptions;

class ApiRequest implements ApiRequestInterface
{
    /** @var RequestInterface $request */
    protected $request;

    /** array $options */
    protected $options = [];

    /**
     * ApiRequest constructor.
     *
     * @param string $method
     * @param string $uri
     */
    public function __construct($method = '', $uri = '')
    {
        $this->request = new Request($method, $uri);
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * {@inheritdoc}
     */
    public function setMethod($method)
    {
        $this->request = $this->request->withMethod($method);
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return $this->request->getMethod();
    }

    /**
     * {@inheritdoc}
     */
    public function setHeader($name, $value)
    {
        $this->request = $this->request->withHeader($name, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function setHeaders(array $headers)
    {
        foreach ($headers as $key => $value) {
            $this->setHeader($key, $value);
        }

        return $this->request;
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaders()
    {
        return $this->request->getHeaders();
    }

    /**
     * {@inheritdoc}
     */
    public function setUri($uri)
    {
        $this->request = $this->request->withUri(new Uri($uri));
    }

    /**
     * {@inheritdoc}
     */
    public function getUri()
    {
        return $this->request->getUri()->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function setBody($body)
    {
        $this->setOptions([RequestOptions::BODY => $body]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return isset($this->options[RequestOptions::BODY]) ? $this->options[RequestOptions::BODY] : '';
    }

    /**
     * {@inheritdoc}
     */
    public function setOptions(array $options)
    {
        $this->options = array_merge($this->options, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        return $this->options;
    }
}
