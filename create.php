<?php

$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new MongoDB\Driver\Query([]); 

$rows = $mng->executeQuery("practice.test", $query);

foreach ($rows as $row) {

    echo "$row->name\n";
}