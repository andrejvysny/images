<?php
// Define the content type as JSON
header("Content-Type: application/json");

// Initialize an empty array to store items
$items = ['message'=>'Hello from Backend!'];


echo json_encode($items);

?>