<?php

namespace Franjid\ApiWrapperBundle\Api;

interface ApiResponseInterface
{
    /**
     * @return int
     */
    public function getStatusCode();

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @param string $headerName
     *
     * @return string
     */
    public function getHeader($headerName);

    /**
     * @return string
     */
    public function getBody();

    /**
     * @return bool
     */
    public function isRedirect();
}
