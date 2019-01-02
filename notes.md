### Setting Up A MongoDB php api
Download mongodb extension and link with php
Download composer, composer require mongodb/mongodb
To use the MongoDB client autoload is required
```php 
require '../vendor/autoload.php';
 ```

## Functions
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

### Projections 
Queries return all fields in matching documents. 
To limit data sent you can include a projection to restrict fields that are returned

```php
$collection->find(
    [
        'cuisine' => 'Italian',
        'borough' => 'Manhattan',
    ],
    [
        'projection' => 
        [
            'name' => 1,
            'borough' => 1,
            'cuisiine' => 1,
        ]
        'limit' => 4,
        'sort' => ['name' => -1],
    ],
)
```
You can add options to sort, limit, and skip documents in queries.

You can write regex expressions to match queries


```php
$cursor = $collection->find([
    'city' => new MongoDB\BSON\Regex('^garden', 'i'),
    'state' => 'TX',
]);
```

### Queries with aggregates
```php
$cursor = $collection->aggregate([
    ['$group' => ['_id' => '$state', 'count' => ['$sum' => 1]]],
    ['$sort' => ['count' => -1]],
    ['$limit' => 5],
]);
```



