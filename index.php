<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/24/19
 * Time: 12:04 AM
 */

use services\PaynetService;

// Отправим HTTP-заголовка, paynet не принимает заголовку кроме text/xml
header("Content-Type: text/xml; charset=utf-8");

$webService = new SoapServer(Constants::WSDL_URL);
$webService->setObject(new PaynetService());
$webService->handle();