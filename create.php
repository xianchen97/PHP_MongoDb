<?php 
require '../vendor/autoload.php';
include_once './CRUD/Database.php';
include_once './CRUD/DataModels/product.php';


$conn    = new Database();
$product = new Product();
$client  = $conn->getClient();

// get posted data
$data = json_decode(file_get_contents("php://input"));

$product->setName($data->name);
$product->setPrice($data->price);
$product->setDescription($data->description);
$product->setCategory_id($data->category_id);
$product->setCreated(date('Y-m-d H:i:s'));
$bson                    = MongoDB\BSON\fromJSON($product->createProduct());
$document                = MongoDB\BSON\toPHP($bson);

$client->practice->users->insertOne($document);
    

