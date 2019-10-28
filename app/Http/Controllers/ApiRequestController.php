<?php

/**
 * Sends API requests using the const URL
 *
 * @author     Jack Wright <mrjackwright@outlook.com>
 * @copyright  2019 OpenGL License
 * @version    Release: @package_version@
 * @link       https://jackscv.co.uk/
 */

namespace App\Http\Controllers;

use App\Services\ApiRequest;

class ApiRequestController extends Controller
{
    public function callApi(string $url)
    {
        $request = (new ApiRequest)->setUrl($url)
            ->setMethod()
            ->setErrorReporting(true)
            ->setRedirectAllowance(true)
            ->setTimeout(10)
            ->sendRequest();
        if ($request instanceof ApiRequest) {
            return $request->getData();
        }
        return $request;
    }
}
