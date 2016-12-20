<?php

namespace Franjid\ApiWrapperBundle\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

class Api implements ApiInterface
{
    /** @var ClientInterface $client */
    protected $client;

    /**
     * ApiAbstract constructor.
     *
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function send(ApiRequestInterface $apiRequest)
    {
        try {
            return new ApiResponse(
                $this->client->send($apiRequest->getRequest(), $apiRequest->getOptions())
            );
        } catch (RequestException $exception) {
            throw new ApiException($exception);
        }
    }
}
