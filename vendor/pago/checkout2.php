<?php
require_once __DIR__ . '/../../vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51RSwZrB2mI0YuH1XDY2fcKFccML5USFPBrp257jtRg2811swizyDk8ltfHJC7wtPydgpFJ2BPrM8aqdtgZKbhDez00z1miUTxf');
$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'USD',
      'product_data' => ['name' => 'Segunda  cuota Sociedad '],
      'unit_amount' => 5000, 
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost:8080/vendor/pago/succes.php',
  'cancel_url' => 'http://localhost:8080/vendor/pago/cancel.php',
]);

header("Location: " . $session->url);
exit;
?>
