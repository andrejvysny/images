<?php
// Define the content type as JSON
header("Content-Type: application/json");

// Initialize an empty array to store items
$items = ['message'=>'Hello from Backend!', 'port'=>8080, 'SERVER_ADDR'=> $_SERVER['SERVER_ADDR'], 'SERVER_NAME'=> $_SERVER['SERVER_NAME']];


echo json_encode($items);

?>