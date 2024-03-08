<?php

function getRequest($api_url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        return "Error: " . curl_error($ch);
    } else {
        curl_close($ch);

        $decodedResponse = json_decode($response, true);
        $prettyJson = json_encode($decodedResponse, JSON_PRETTY_PRINT);

        return $prettyJson;
    }
}