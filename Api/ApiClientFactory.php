<?php

namespace Franjid\ApiWrapperBundle\Api;

use GuzzleHttp\Client;

class ApiClientFactory
{
    /**
     * @param mixed $baseUri
     *
     * @return Client
     */
    public function createApiClient($baseUri)
    {
        return new Client([
            'base_uri' => $this->getBaseUri($baseUri),
        ]);
    }

    /**
     * @param mixed $baseUri
     *
     * @return string
     */
    public function getBaseUri($baseUri)
    {
        if (is_array($baseUri)) {
            $baseUri = $baseUri[mt_rand(0, count($baseUri) - 1)];
        }

        return $baseUri;
    }
}
