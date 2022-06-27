<?php

namespace Lib\ShoppingCart;

use Models\Product\Product;
use Lib\ShoppingCartItem\ShoppingCartItem;

class ShoppingCart
{

    protected $items = [];

    public function __construct($cartFromSession)
    {
        foreach ($cartFromSession as $item) {
            $this->items[] = new ShoppingCartItem(Product::getOneProductById($item['id']), $item['quantity']);
        }
    }


    public function addToCart($product, $quantity = 1)
    {
        $flag = false;
        foreach ($this->items as $item) {
            if ($item->getProduct()->id == $product->id) {
                $item->setQuantity($item->getQuantity() + $quantity);
                $flag = true;
            }
        }
        if (!$flag) {
            $this->items[] = new ShoppingCartItem($product, $quantity);
        }
        return $this;
    }

    public function removeProduct(Product $product)
    {
        if ($product instanceof Product) {
            foreach ($this->getItems() as $key => $item) {
                if ($item->getProduct()->id == $product->id) {
                    unset($this->items[$key]);
                }
            }
        }
        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function checkout()
    {
        //
    }

    public function updateSession()
    {
        $_SESSION['cart'] = [];
        foreach ($this->items as $item) {
            $_SESSION['cart'][] = [
                'id' => $item->getProduct()->id,
                'quantity' => $item->getQuantity()
            ];
        }
    }
}
