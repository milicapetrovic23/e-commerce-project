<?php
session_start();

require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";

use Models\Model\Model;

$systemErrors = [];



    $name = "";
    $last_name = "";
    $email = "";
    $message = "";

    // VALIDACIJA
    if  (isset($_POST['contact'])) {
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
        // MESSAGE
        $message = (string) $_POST['message'];
        $message = trim($message);
        
        if(empty($systemErrors)) {
            Model::addContact($name, $last_name, $email, $message);
            header('Location: ./index.php');
        }
    }



// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-contact-us.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";