<?php include("DatabaseConnection.php"); ?>

<?php
require '../vendor/autoload.php';
    $conn = new DatabaseConnection();
    var_dump($conn->getConnection());

$client = new MongoDB\Client;

foreach ($client->listDatabases() as $databaseInfo) {
    var_dump($databaseInfo);
}


$practice = $client->practice->test;

var_dump($practice);

/*$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$id = new MongoDB\BSON\ObjectId("5c2813dbc4ade5e2b9ef60e0");
$filter = ['name' => 'joe'];
$options = [];
$query = new MongoDB\Driver\Query([$filter, $options]); 
$rows = $mng->executeQuery("practice.test", $query);

foreach ($rows as $document){
    print($document);
}


*/