<?php

require_once ('../stripe-php-7.78.0/init.php');

use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

Stripe::setApiKey('sk_test_51IqyqrH6quEIoqbt3k52nYAguXLprYxVHDLZ3cXsjhMi7FMJgEXMy0o7My9SA4tauxgUNbd1ucbWkBTa9B7dslp100b5BVqVtY');
header('Content-Type: application/json');

$DOMAIN = 'http://localhost:8080';

try {
    $checkout_session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'unit_amount' => 1000,
                'product_data' => [
                    'name' => 'Stubborn Attachments',
                    'images' => ["https://i.imgur.com/EHyR2nP.png"],
                ],
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => $DOMAIN . '/success.html',
        'cancel_url' => $DOMAIN . '/',
    ]);
} catch (ApiErrorException $e) {
}

echo json_encode(['id' => $checkout_session->id]);