<?php
// set URL and other appropriate options
$url =  "http://maps.googleapis.com/maps/api/directions/json?origin=Challakere&destination=Bangalore";

$myCurlSubmit = curl_init();

    curl_setopt($myCurlSubmit, CURLOPT_URL, $url);    
    curl_setopt($myCurlSubmit, CURLOPT_HEADER, 0);
curl_setopt($myCurlSubmit, CURLOPT_RETURNTRANSFER, 1); 
    $response = curl_exec($myCurlSubmit);

    curl_close($myCurlSubmit);
$arraydist = json_decode($response);
$totalkm = explode('km',$arraydist->routes[0]->legs[0]->distance->text);
$totalkilometers = $totalkm[0];
echo $totalkilometers;

?>