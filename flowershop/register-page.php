<?php
session_start();

require_once __DIR__ . "/Models/Model.php";
use Models\Model\Model;

$systemErrors = [];



    $name = "";
    $last_name = "";
    $email = "";
    $password = "";
    $repassword = "";

    // VALIDACIJA
    if  (isset($_POST['register'])) {
        // NAME
        $name = (string) $_POST['name'];
        $name = trim($name);
        if(empty($name)) {
            $systemErrors['name'] = "Field name is required!";
        }
        if(empty($systemErrors['name']) && !is_string($name)) {
            $systemErrors['name'] = "Name is not valid!";
        }
        // LAST NAME
        $last_name = (string) $_POST['last_name'];
        $last_name = trim($last_name);
        if(empty($last_name)) {
            $systemErrors['last_name'] = "Field last name is required!";
        }
        if(empty($systemErrors['last_name']) && !is_string($last_name)) {
            $systemErrors['last_name'] = "Last name is not valid!";
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
        // PASSWORD
        $password = (string) $_POST['password'];
        if(empty($password)) {
            $systemErrors['password'] = "Field password is required!";
        }
        if(empty($systemErrors['password']) && (!is_string($password) && !strlen((string)$password)<8)) {
            $systemErrors['password'] = "Password must contain 8 characters or more!";
        }
        // REPASSWORD
        $repassword = (string) $_POST['repassword'];
        if(empty($repassword)) {
            $systemErrors['repassword'] = "Field retype password is required!";
        }
        if(empty($systemErrors['repassword']) && $repassword!=$password) {
            $systemErrors['repassword'] = "Password and retyped password don't match!";
        }
        
        if(empty($systemErrors)) {
            $crypted = md5($password);
            Model::register($name, $last_name, $email, $crypted);
            header('Location: ./index.php');
        }
    }



// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-register.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";