<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(__DIR__);
$baseDir = dirname($vendorDir);

return array(
    'Psr\\Http\\Message\\' => array($vendorDir . '/psr/http-factory/src', $vendorDir . '/psr/http-message/src'),
    'PHPMailer\\PHPMailer\\' => array($vendorDir . '/phpmailer/phpmailer/src'),
    'Model\\' => array($baseDir . '/model'),
    'MVC\\' => array($baseDir . '/'),
    'Intervention\\Image\\' => array($vendorDir . '/intervention/image/src/Intervention/Image'),
    'GuzzleHttp\\Psr7\\' => array($vendorDir . '/guzzlehttp/psr7/src'),
    'Controllers\\' => array($baseDir . '/controllers'),
);
