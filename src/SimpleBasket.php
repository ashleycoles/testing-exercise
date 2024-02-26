<?php

class SimpleBasket
{
    protected array $products = [];

    /**
     * Adds a product to the basket. Only allows a product to be added once
     * Returns true if the product was added
     * Returns false if the product is a duplicate
     */
    public function add(string $productName): bool
    {
        if (in_array($productName, $this->products)) {
            return false;
        }

        $this->products[] = $productName;
        return true;
    }

    /**
     * Removes a product from the basket
     *
     * Returns true if the product was removed
     * Returns false if the product was not in the basket
     */
    public function remove(string $productName): bool
    {
        if (!in_array($productName, $this->products)) {
            return false;
        }

        $productKey = array_search($productName, $this->products);
        unset($this->products[$productKey]);
        return true;
    }

    /**
     * Returns the number of products currently in the basket
     */
    public function count(): int
    {
        return count($this->products);
    }

    public function getContents(): array
    {
        return $this->products;
    }
}
