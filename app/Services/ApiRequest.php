<?php

namespace Services\Api;

use GuzzleHttp\{Client, Psr7, Exception\RequestException};

class Request
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
     * @return Request
     */
    public function setUrl(string $url): Request
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param float $timeout
     * @return Request
     */
    public function setTimeout(float $timeout): Request
    {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * @param bool $value
     * @return Request
     */
    public function setErrorReporting(bool $value): Request
    {
        $this->options['http_errors'] = $value;
        return $this;
    }

    /**
     * @param array $headers
     * @return Request
     */
    public function setHeaders(array $headers): Request
    {
        $this->options['headers'] = $headers;
        return $this;
    }

    /**
     * @param string $method
     * @return Request
     */
    public function setMethod(string $method = self::DEFAULT_METHOD_TYPE): Request
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @param bool $value
     * @return Request
     */
    public function setRedirectAllowance(bool $value): Request
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
