<?php
session_start();
// PAGE TITLE
$page = 'index';

require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";

use Models\Product\Product;

try {
    $mostProducts = Product::getFourRandomProducts();
} catch (\Throwable $th) {
    die("ERROR");
}

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-index.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";