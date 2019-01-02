<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//Query to display the next 5 restaurants after skipping first 5 which are in the borough Bronx. Go to the editor
include('../../vendor/autoload.php');
include('../Database.php');

$conn           = new Database();
$client         = $conn->getClient();
$resCollection  = $client->practice->restaurants;
$cursor         = $resCollection->find(["borough" => "Bronx"],
    [
        'projection' => [
            'restaurant_id' => 1,
            'name'          => 1,
            'borough'       => 1,
            '_id'           => 0
        ],
        'skip'  => 5,
        'limit' => 5,
    ]
);

foreach($cursor as $restaurant){
    echo var_dump(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($restaurant))), '<br> <br>';
}