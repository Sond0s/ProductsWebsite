<?php
// connection to MYSQL
require('database/DBController.php');

// require product class
require('database/product.php');


// require wishlist class
require('database/Wish.php');

// require morning class
require('database/Morning.php');

// require evening class
require('database/Evening.php');


// start creating objects
$db = new DBController();

// product object
$product = new Product($db);

$product_shuffle = $product->getData();

// Wish object
$Wish = new Wish($db);

// Morning routine object
$Morning = new Morning($db);

// Evening routine object
$Evening = new Evening($db);

