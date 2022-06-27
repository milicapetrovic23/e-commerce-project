<?php
session_start();
if(empty($_SESSION['cart'])) {
    header("Location: ./all-products-page.php");
}

require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

use Lib\ShoppingCart\ShoppingCart;

$systemErrors = [];

try {
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    $items = $shoppingCart->getItems();

    $name = "";
    $last_name = "";
    $email = "";
    $city = "";
    $phone = "";
    $street = "";
    $zip = "";
    $message = "";
    $rights = "";
    // VALIDACIJA NARUCIVANJA
    if  (isset($_POST['buy'])) {
        // NAME
        $name = (string) $_POST['name'];
        $name = trim($name);
        if(empty($name)) {
            $systemErrors['name'] = "Field name is required!";
        }
        // LAST NAME
        $last_name = (string) $_POST['last_name'];
        $last_name = trim($last_name);
        if(empty($last_name)) {
            $systemErrors['last_name'] = "Field last name is required!";
        }
        // EMAIL
        $email = (string) $_POST['email'];
        $email = trim($email);
        if(empty($email)) {
            $systemErrors['email'] = "Field email is required!";
        }
        if(empty($systemErrors['email']) && !str_contains($email, "@")) {
            $systemErrors['email'] = "Mail must include @!";
        }
        // CITY
        $city = (string) $_POST['city'];
        $city = trim($city);
        if(empty($city)) {
            $systemErrors['city'] = "Field city is required!";
        }
        // PHONE
        $phone = (string) $_POST['phone'];
        $phone = trim($phone);
        if(empty($phone)) {
            $systemErrors['phone'] = "Field phone is required!";
        }
        if(empty($systemErrors['phone']) && (!is_numeric($phone) || strlen((string) $phone)<9 || strlen((string) $phone)>11)) {
            $systemErrors['phone'] = "Phone number is not valid!";
        }
        // STREET
        $street = (string) $_POST['street'];
        $street = trim($street);
        // ZIP
        $zip = (string) $_POST['zip'];
        $zip = trim($zip);
        if(empty($zip)) {
            $systemErrors['zip'] = "Field zip is required!";
        }
        // MESSAGE
        $message = (string) $_POST['message'];
        $message = trim($message);
        // RIGHTS
        if(empty($_POST['rights'])) {
            $systemErrors['rights'] = "You must check your rights!";
        }
        else $rights = (string) $_POST['rights'];
        if(empty($systemErrors)) {
            $_SESSION['cart'] = [];
            header('Location: ./thank-you-page.php');
        }
    }
} catch (\Throwable $th) {
    $_SESSION['cart'] = [];
    header("Location: ./");
}


// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-checkout.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";