<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//Query to find the restaurants who achieved a score more than 90. Go to the editor
include('../../vendor/autoload.php');
include('../Database.php');

$conn           = new Database();
$client         = $conn->getClient();
$resCollection  = $client->practice->restaurants;
$cursor         = $resCollection->aggregate([
    ['$match' => ['grades.score' => ['$gte' => 80, 
                                    '$lte' => 90]]],
]);


foreach($cursor as $restaurant){
    echo var_dump(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($restaurant))), '<br> <br>';
}

