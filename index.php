<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/24/19
 * Time: 12:04 AM
 */

$webService = new SoapServer(Constants::WSDL_URL);
$webService->setClass('services\PaynetService');
$webService->handle();