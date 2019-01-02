<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include('../../vendor/autoload.php');
include('../Database.php');

$conn           = new Database();
$client         = $conn->getClient();
$resCollection  = $client->practice->restaurants;
$cursor         = $resCollection->find(['borough' => 'Bronx'],
    [
        'projection' => [
            'name' => 1,
        ],
    ]
);

foreach($cursor as $restaurant){
    echo var_dump(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($restaurant))), '<br> <br>';
}