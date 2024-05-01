<?php
// connection to MYSQL
require('database/DBController.php');

// require product class
require('database/product.php');


// require wishlist class
require('database/Wish.php');

// require wishlist class
require('database/Morning.php');


// start creating an object
$db = new DBController();

// product object
$product = new Product($db);

$product_shuffle = $product->getData();

$Wish = new Wish($db);



// $Morning= new Morning($db);
