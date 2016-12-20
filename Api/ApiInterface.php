<?php

namespace Franjid\ApiWrapperBundle\Api;

interface ApiInterface
{
    /**
     * @param ApiRequestInterface $apiRequest
     *
     * @return ApiResponseInterface
     *
     * @throws ApiException
     */
    public function send(ApiRequestInterface $apiRequest);
}
