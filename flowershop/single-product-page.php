<?php
session_start();

// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;

$productId = null;
$systemErrors = [];

try {
    // GET ONE PRODUCT AND RELATED
    if (!empty($_GET['product'])) {
        $product = Product::getOneProductById($_GET['product']);
        $relatedProducts = $product->getRelatedProducs();
    }

    // SHOPPING CART (SESSION)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
        if(isset($_POST['quantity']) && is_numeric($_POST['quantity']) && $_POST['quantity'] > 0) {
            $shoppingCart->addToCart(Product::getOneProductById($_POST['product_id']), $_POST['quantity']);
            $shoppingCart->updateSession();
        } else {
            $systemErrors['quantity'] = "Not valid Quantity";
        }
    }
} catch (\Throwable $th) {
    header("Location: ./page-not-found.php");
}




// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-single-product.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
