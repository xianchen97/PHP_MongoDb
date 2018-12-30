###Setting Up A MongoDB php api
Download mongodb extension and link with php
Download composer, composer require mongodb/mongodb
To use the MongoDB client autoload is required
```php 
require '../vendor/autoload.php';
 ```

##Functions
```php
insertOne([]); Insert to mongoDB Query
getInsertedId()
getInsertedCount()

findOne([])
find([])
```

#Things to keep track of 
MongoDB uses key value pairs 
```php
//Convert JSON to BSON
$bson = MongoDB\BSON\fromJSON($product->createProduct());
$document = MongoDB\BSON\toPHP($bson);
```

