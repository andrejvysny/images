<?php
// Define the content type as JSON
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Initialize an empty array to store items
$items = ['message'=>($_ENV['MESSAGE'] ?? 'No MESSAGE variable in ENV'), 'port'=>$_SERVER['SERVER_PORT'], 'SERVER_ADDR'=> $_SERVER['SERVER_ADDR'], 'SERVER_NAME'=> $_SERVER['SERVER_NAME'], 'ENV'=>$_ENV];


echo json_encode($items);

?>