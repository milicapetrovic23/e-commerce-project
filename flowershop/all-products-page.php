<?php
session_start();
// PAGE TITLE
$page = "all-products-page";

if (!empty($_GET['page'])) {
    $pagPage = $_GET['page'];
} else {
    $pagPage = 1;
}
// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;


    // GET PRODUCTS
    $productsAll = Product::getAvailableProducts($pagPage);
  
    // TERM AND SORT
    $term = "";
    $sort = "";
    if (!empty($_GET['term'])) {
        $term = $_GET['term'];
    }
    if (!empty($_GET['sort'])) {
        $sort = $_GET['sort'];
    }
    if ($term != "") {
        $productsAll = Product::filteredProducts($term, $productsAll);
    }
    if ($sort != "") {
        $productsAll = Product::sortProductBy($sort, $productsAll);
    }
    $limit = 9;
    $numberOfPages = ceil(count($productsAll)/$limit);
    $firstResult = ($pagPage-1)*$limit;
    $products = [];
    $products = array_slice($productsAll,$firstResult,$limit);
    // SHOPPING CART (SESSION)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
        $shoppingCart->addToCart(Product::getOneProductById($_POST['product_id']));
        $shoppingCart->updateSession();
    }

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-products.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
