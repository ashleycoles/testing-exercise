<?php

class Product
{
    protected string $title;
    protected float $price;

    public function __construct(string $title, float $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}