<?php
    // require 'vendor/autoload.php';
	POST https://api.xendit.co/v2/invoices;
    $options['secret_api_key'] = 'xnd_development_maxke1eOgD2Bt4ZJMx7iB0TwQHsLxmPbLsVYvsUIkUS8nuw05mrapqP4bK5s';
    $xenditPHPClient = new XenditClient\XenditPHPClient($options);
    $external_id = 'demo_1475801962607';
    $payer_email = 'sample_email@xendit.co';
    $description = 'Trip to Bali';
    $amount = 13000;
    $response = $xenditPHPClient->createInvoice($external_id, $amount, $payer_email, $description);
    print_r($response);
?>
