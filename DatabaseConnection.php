<?php
require '../vendor/autoload.php';

class DatabaseConnection {
    private $dbhost = 'localhost';
    private $dbport = '27017';
    private $conn;

    function __construct(){
        $this->conn =new MongoDB\Client;

    }

    function getConnection(){
        return $this->conn;
    }

    function getDeviceManager(){
        return new MongoDB\Driver\Manager('mongodb://'.$this->dbhost.':'.$this->dbport);
    }

    function getDatabase($db){
        return $this->conn->$db;
    }

    function getTable($tb){
        return getDatabase()->$tb;
    }

}