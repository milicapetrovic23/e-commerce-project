<?php

namespace Lib\ShoppingCartItem;

use Models\Product\Product;

class ShoppingCartItem {

    protected $product;
    protected $quantity;

    public function __construct($product, $quantity)
    {
        $this->setProduct($product);
        $this->setQuantity($quantity);
    }

    public function getProduct() {
        return $this->product;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getSubtotal() {
        return $this->getProduct()->price * $this->getQuantity();
    }

    public function setProduct(Product $product) {
       if (!($product instanceof Product)) {
           return false;
       }
        $this->product = $product;
        return $this;
    }

    public function setQuantity($quantity) {
        if (!is_numeric($quantity) || $quantity < 0) {
            return false;
        }
        $this->quantity = $quantity;
        return $this;
    }

}
