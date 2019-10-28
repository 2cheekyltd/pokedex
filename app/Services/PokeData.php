<?php

namespace App\Services;

/**
 * Pokemon Data Manager
 *
 * @author     Jack Wright <mrjackwright@outlook.com>
 * @copyright  2019 OpenGL License
 * @version    Release: @package_version@
 * @link       https://jackscv.co.uk/
 */

use App\Services\ApiRequest as Api;

class PokeData
{
    private $resultSet         = [];
    private $singleResults = [];

    /**
     * @param String $url
     * @return PokeData
     */
    public function getResultSet(String $url): PokeData
    {
        $this->resultSet = (array) $this->sendRequest($url)['data']['results'];
        return $this;
    }

    /**
     * @return array
     */
    public function gatherIndividualDataFromResults(): array
    {
        foreach ($this->resultSet as $result) {
            $this->singleResults[] = (array) $this->sendRequest($result->url);
        }
        return $this->singleResults;
    }

    /**
     * @param $url
     * @return array|\Psr\Http\Message\RequestInterface|Api|string
     */
    public function sendRequest($url)
    {
        $request = (new Api)->setUrl($url)
            ->setMethod()
            ->setErrorReporting(true)
            ->setRedirectAllowance(true)
            ->setTimeout(10)
            ->sendRequest();
        if ($request instanceof Api) {
            return $request->getData();
        }
        return $request;
    }
}
