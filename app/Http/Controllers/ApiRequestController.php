<?php

namespace App\Http\Controllers;

use Services\ApiRequest;

class ApiRequestController extends Controller
{
    public function callApi(string $url)
    {
        $request = (new Request)->setUrl($url)
            ->setMethod()
            ->setErrorReporting(true)
            ->setRedirectAllowance(true)
            ->setTimeout(10)
            ->sendRequest();
        if ($request instanceof Request) {
            return $request->getData();
        }
        return $request;
    }
}
