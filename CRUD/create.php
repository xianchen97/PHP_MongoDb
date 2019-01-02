<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('./../../vendor/autoload.php');
include('../Database.php');
include('./DataModels/product.php');

$conn    = new Database();
$product = new Product();
$client  = $conn->getClient();

// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// Check if posted data is
if(
    !empty($data->name)        &&
    !empty($data->price)       &&
    !empty($data->description) &&
    !empty($data->category_id)
){
    // set product property values
    $product->setName($data->name);
    $product->setPrice($data->price);
    $product->setDescription($data->description);
    $product->setCategory_id($data->category_id);
    $product->setCreated(date('Y-m-d H:i:s'));
    $bson                    = MongoDB\BSON\fromJSON($product->createProduct());
    $document                = MongoDB\BSON\toPHP($bson);
    
    $client->practice->users->insertOne($document);
        
}
else{
    print('empty fields!');
}

