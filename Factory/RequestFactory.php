<?php

namespace Kevintweber\KtwGaugesBundle;

use Kevintweber\Gauges\Request;
use Psr\Log\LoggerInterface;

class RequestFactory
{
    static public function createRequest($log_format,
                                         $proxy,
                                         $timeout,
                                         $token,
                                         LoggerInterface $logger = null)
    {
        $httpDefaults = array();
        if ($proxy !== null) {
            $httpDefaults['proxy'] = $proxy;
        }

        if ($timeout !== null) {
            $httpDefaults['timeout'] = $timeout;
        }

        $request = new Request($token, $httpDefaults);

        if ($logger instanceof LoggerInterface) {
            $request->attachLogger($logger, $log_format);
        }

        return $request;
    }
}