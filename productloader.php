<?php
header('Content-Type: application/json');
require_once 'classloader.php';
$db = new Database();

$items = $db->getRows('SELECT * FROM products');   //Select all products

foreach($items as $eachItem){                 //Convert each product into an Item object and add to array

    $itemsJSON[] = new Item($eachItem->product_name, $eachItem->product_quantity, $eachItem->product_cost);

}

echo json_encode($itemsJSON);   //Echo out JSON for use in 'productloaderhelper.js'









