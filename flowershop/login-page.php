<?php
session_start();

require_once __DIR__ . "/Models/Model.php";
use Models\Model\Model;

$systemErrors = [];

    $email = "";
    $password = "";
    $flag="";

    // VALIDACIJA
    if  (isset($_POST['login'])) {
        // EMAIL
        $email = (string) $_POST['email'];
        $email = trim($email);
        if(empty($email)) {
            $systemErrors['email'] = "Field email is required!";
        }
        if(empty($systemErrors['email']) && !str_contains($email, "@")) {
            $systemErrors['email'] = "Mail must include @!";
        }
        // PASSWORD
        $password = (string) $_POST['password'];
        if(empty($password)) {
            $systemErrors['password'] = "Field password is required!";
        }if(empty($systemErrors['password']) && $flag!=false) {
            $systemErrors['password'] = "Password is incorrect!";
        }
        
        if(empty($systemErrors)) {
            $flag = (Model::login($email, $password));
            if ($flag==true) header('Location: ./profile-page.php');
        }
    }

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-login.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
