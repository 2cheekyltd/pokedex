<?php

/**
 * API Request Controller
 *
 * @author     Jack Wright <mrjackwright@outlook.com>
 * @copyright  2019 OpenGL License
 * @version    Release: @package_version@
 * @link       https://jackscv.co.uk/
 */

namespace App\Services;

use GuzzleHttp\{Client, Psr7, Exception\RequestException};

class ApiRequest
{
    private const DEFAULT_METHOD_TYPE = 'GET';
    private $url;
    private $client;
    private $method;
    private $response;
    private $options = [];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $url
     * @return ApiRequest
     */
    public function setUrl(string $url): ApiRequest
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param float $timeout
     * @return ApiRequest
     */
    public function setTimeout(float $timeout): ApiRequest
    {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * @param bool $value
     * @return ApiRequest
     */
    public function setErrorReporting(bool $value): ApiRequest
    {
        $this->options['http_errors'] = $value;
        return $this;
    }

    /**
     * @param array $headers
     * @return ApiRequest
     */
    public function setHeaders(array $headers): ApiRequest
    {
        $this->options['headers'] = $headers;
        return $this;
    }

    /**
     * @param string $method
     * @return ApiRequest
     */
    public function setMethod(string $method = self::DEFAULT_METHOD_TYPE): ApiRequest
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @param bool $value
     * @return ApiRequest
     */
    public function setRedirectAllowance(bool $value): ApiRequest
    {
        $this->options['allow_redirects'] = $value;
        return $this;
    }

    public function sendRequest()
    {
        try {
            $this->response = $this->buildRequest();
        } catch (RequestException $e) {
            return ($e->hasResponse()) ? Psr7\str($e->getResponse()) : $e->getRequest();
        }
        return $this;
    }

    private function buildRequest()
    {
        return $this->client->request(
            $this->method,
            $this->url,
            $this->options
        );
    }

    public function getData(): array
    {
        return [
            'status_code' => $this->response->getStatusCode(),
            'data' => (array)json_decode($this->response->getBody())
        ];
    }
}
