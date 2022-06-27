<?php
session_start();
if(empty($_SESSION['cart'])) {
    header("Location: ./all-products-page.php");
}

// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;

try {
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    // REMOVE ITEMS
    if(!empty($_POST['remove']) && is_array($_POST['remove'])) {
        foreach ($_POST['remove'] as $productId) {
            $shoppingCart->removeProduct(Product::getOneProductById($productId));
            $shoppingCart->updateSession();
            if(empty($_SESSION['cart'])) {
                header("Location: ./all-products-page.php");
            }
        }
    }
    $items = $shoppingCart->getItems();
} catch (\Throwable $th) {
    header("Location: ./");
}


// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-shopping-cart.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";