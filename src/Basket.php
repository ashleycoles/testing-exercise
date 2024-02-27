<?php

require_once 'src/Product.php';

class Basket
{
    /**
     * @var Product[]
     */
    protected array $products = [];

    /**
     * Adds a product to the basket. Only allows a product to be added once
     * Returns true if the product was added
     * Returns false if the product is a duplicate
     */
    public function add(Product $product): bool
    {
        $newProductTitle = $product->getTitle();

        if (isset($this->products[$newProductTitle])) {
            return false;
        }

        $this->products[$newProductTitle] = $product;
        return true;
    }

    /**
     * Removes a product from the basket
     *
     * Returns true if the product was removed
     * Returns false if the product was not in the basket
     */
    public function remove(Product $product): bool
    {
        $productToRemoveTitle = $product->getTitle();

        // Make sure the product is in the basket before removing it
        if (!isset($this->products[$productToRemoveTitle])) {
            return false;
        }

        unset($this->products[$productToRemoveTitle]);
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

    public function getPrice(): float
    {
        $total = 0;

        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }

        return $total;
    }
}
