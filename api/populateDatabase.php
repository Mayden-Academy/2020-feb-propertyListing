<?php

$propertyUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/properties.json";
$statusUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/statuses.json";
$typeUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/types.json";

function properties($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);
    $result = json_decode($output, true);
    curl_close($ch);

    return $result;
}
$propertyResult = properties($propertyUrl);
$statusResult = properties($statusUrl);
$typeResult = properties($typeUrl);
var_dump($propertyResult);
var_dump($typeResult);
var_dump($statusResult);



function getArmadillosEstates(): PDO
{
    $db = new PDO('mysql:host=DB;dbname=armadillosEstate', 'root', 'password');
    //$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

function insertIntoDB(array $,PDO $db): bool
{
    $query = $db->prepare("INSERT INTO `bread` (`name`, `type`, `rating`, `desc`, `imgurl`) VALUES (:name, :type, :rating, :desc, :imgurl);");
    $ = $query->execute($newBread);
    return $;
}