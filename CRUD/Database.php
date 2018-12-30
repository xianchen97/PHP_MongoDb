<?php
require '../vendor/autoload.php';

class Database{
    private $dbhost = 'localhost';
    private $dbport = '27017';
    private $client;
    private $driverManager;

    function __construct(){
        try{
            $this->client        =  new MongoDB\Client;
            $this->driverManager =  new MongoDB\Driver\Manager('mongodb://'.$this->dbhost.':'.$this->dbport);

        }catch(Exception $e){
            echo "Connection Error: " . $e->getMessage();
        }

    }
    
    function getDeviceManager(){
        return $this->driverManager;
    }

    function getClient(){
        return $this->client;
    }

}