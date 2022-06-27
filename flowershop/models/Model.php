<?php

namespace Models\Model;

class Model
{
    protected static $hostname = "127.0.0.1";
    protected static $username = "root";
    protected static $password = "";
    protected static $database = "flowershop";
    protected static $connection;
    protected static $db_status;
    protected static $statement;

    protected static function connection($table)
    {
        self::$connection = new \PDO("mysql:host=" . self::$hostname . ";dbname=" . self::$database . ";charset=utf8", self::$username, self::$password);
        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sqlQueryString = "SELECT * FROM " . $table;
        self::$statement = self::$connection->prepare($sqlQueryString);
        self::$db_status = self::$statement->execute();
    }

    protected static function fetchAll()
    {
        $rows = self::$statement->fetchAll();
        $numberOfRows = count($rows);
        if ($numberOfRows > 0) {
            return $rows;
        }
        return null;
    }

    public static function addContact($name, $last_name, $email, $message)
    {
        self::$connection = new \PDO("mysql:host=" . self::$hostname . ";dbname=" . self::$database . ";charset=utf8", self::$username, self::$password);
        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sqlQueryString = "INSERT INTO contacts(name, last_name, email, message) VALUES (?, ?, ?, ?)";
        self::$statement = self::$connection->prepare($sqlQueryString);
        self::$db_status = self::$statement->execute([$name, $last_name, $email, $message]);
    }

    public static function register($name, $last_name, $email, $password)
    {
        self::$connection = new \PDO("mysql:host=" . self::$hostname . ";dbname=" . self::$database . ";charset=utf8", self::$username, self::$password);
        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sqlQueryString = "INSERT INTO users(name, last_name, email, password) VALUES (?, ?, ?, ?)";
        self::$statement = self::$connection->prepare($sqlQueryString);
        self::$db_status = self::$statement->execute([$name, $last_name, $email, $password]);
    }
   
    public static function login($email, $thepassword)
    {
        $pw=md5($thepassword);
        self::$connection = new \PDO("mysql:host=" . self::$hostname . ";dbname=" . self::$database . ";charset=utf8", self::$username, self::$password);
        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sqlQueryString = "SELECT * FROM users WHERE email='$email' AND password='$pw';";
        self::$statement = self::$connection->prepare($sqlQueryString);
        self::$db_status = self::$statement->execute();
        $rows = self::$statement->fetchAll();
        $numberOfRows = count($rows);
        
        if ($numberOfRows>0) {
            return true;
        }
        else {
            return false;
        }
    } 
}

