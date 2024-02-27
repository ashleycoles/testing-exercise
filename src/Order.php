<?php

require_once 'src/Basket.php';
require_once 'src/Customer.php';


class Order {
    protected Basket $basket;
    protected Customer $customer;
    protected string $notes;

    public function __construct(Basket $basket, Customer $customer, string $notes)
    {
        $this->basket = $basket;
        $this->customer = $customer;
        $this->notes = $notes;
    }

    public function generateInvoice(): string
    {
        $output = '<h1>Invoice for ' . $this->customer->getName() . '</h1>';
        $output .= '<p>' . $this->customer->getEmail() . '</p>';
        $output .= '<p>' . $this->customer->getAddress() . '</p>';
        $output .= '<p>' . $this->notes . '</p>';
        $output .= '<ul>';
        foreach ($this->basket->getContents() as $product) {
            $output .= '<li>' . $product->getTitle() .' - ' . $product->getPrice() . '</li>';
        }
        $output .= '</ul>';
        $output .= '<p>Total: £' . $this->basket->getPrice() . '</p>';

        return $output;
    }
}


