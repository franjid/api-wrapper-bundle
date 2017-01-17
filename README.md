# API Wrapper Bundle for Symfony

[![Build Status](https://travis-ci.org/franjid/api-wrapper-bundle.svg?branch=master)](https://travis-ci.org/franjid/api-wrapper-bundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/franjid/api-wrapper-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/franjid/api-wrapper-bundle/)
[![Code Coverage](https://scrutinizer-ci.com/g/franjid/api-wrapper-bundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/franjid/api-wrapper-bundle/)

The aim of this bundle is to act as a wrapper for any API library you want to use in Symfony. In this case with Guzzle, the most popular PHP HTTP client library.

It has never been so easy to consume an API than with this bundle.

## What can you find?

##### Api.php

This is where the encapsulation magic happens.

It has only one method **send** that sends the proper request to the API.

##### ApiClientFactory.php
Used to create all different API clients. When defined it requires a base uri for the API as a simple string or an array of different url's. In case that an array is given, the factory will choose one of them randomly. This is kind of a basic basic load balancer implemented because of reasons.

##### ApiRequest.php
It has to be used to send requests to API's. Using the different methods you will be able to set the request method (GET, POST, etc), set headers, set the endpoint, etc.

##### ApiResponse.php
Object returned when successfully calling **send** method in *Api*. You can get the response status code, headers or body.

## How to use it

First things first, install package via composer:
```
composer require franjid/api-wrapper-bundle
```

### Example: adding an API for [Xkcd API](https://xkcd.com/json.html)

First step is to define the API Client in your services config file
```
    ApiClientXkcd:
        class: ApiClientXkcd
        factory: [@ApiWrapperBundle.Component.Api.ApiClientFactory, createApiClient]
        arguments:
            - %apiXkcdBaseURI%
```
That will create the *ApiClientXkcd* taking the parameter *apiXkcdBaseURI* and injecting it so we have a base URI.

apiXkcdBaseURI should be in the format
```
    apiXkcdBaseURI: 'http://xkcd.com/'
```

Now is time to create the interface, then the service class and add it to your services config file
```
    Service.Api.ApiXkcdServiceInterface:
        class: AppBundle\Service\Api\ApiXkcdService
        arguments:
            - @ApiClientXkcd
```

At this moment you're ready to go for adding your awesome methods that will call the API.
