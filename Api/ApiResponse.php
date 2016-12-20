<?php

namespace Franjid\ApiWrapperBundle\Api;

use Psr\Http\Message\ResponseInterface;

class ApiResponse implements ApiResponseInterface
{
    /** @var ResponseInterface $response */
    protected $response;

    /**
     * ApiResponse constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaders()
    {
        return $this->response->getHeaders();
    }

    /**
     * {@inheritdoc}
     */
    public function getHeader($headerName)
    {
        $headerContent = $this->response->getHeader($headerName);

        return isset($headerContent[0]) ? $headerContent[0] : '';
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return $this->response->getBody()->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function isRedirect()
    {
        $statusCode = $this->response->getStatusCode();

        return $statusCode >= 300 && $statusCode < 400;
    }
}
