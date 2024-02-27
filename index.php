<?php

require_once 'src/Order.php';

// Order usage example
$product1 = new Product('test', 12.9);
$product2 = new Product('vest', 100);

$basket = new Basket();
$basket->add($product1);
$basket->add($product2);

$customer = new Customer('Steve', 'steve@steve.com', '123 street');

$order = new Order($basket, $customer, 'testing notes');

echo $order->generateInvoice();