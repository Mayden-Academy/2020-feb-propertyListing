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

function getArmadillosEstates(): PDO
{
    $db = new PDO('mysql:host=DB;dbname=armadilloEstates', 'root', 'password');
    //$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

function insertIntoPropertiesTable(PDO $db, array $propertyData): bool
{
    $query = $db->prepare("INSERT INTO `properties` (`AgentRef`,
                                                                 `Address1`,
                                                                 `Address2`,
                                                                 `Town`,
                                                                 `Postcode`, 
                                                                 `Description`, 
                                                                 `Beds`, 
                                                                 `Price`, 
                                                                 `Image`, 
                                                                 `PropertyType`, 
                                                                 `Status`) 
                                                        VALUES (:AGENT_REF, 
                                                                :ADDRESS_1, 
                                                                :ADDRESS_2, 
                                                                :TOWN, 
                                                                :POSTCODE, 
                                                                :DESCRIPTION, 
                                                                :BEDROOMS, 
                                                                :PRICE, 
                                                                :IMAGE, 
                                                                :TYPE, 
                                                                :STATUS);");
    $insertDB = $query->execute($propertyData);
    return $insertDB;
}


$database = getArmadillosEstates();

//foreach ($propertyResult as $property) {
//    insertIntoPropertiesTable($database, $property);
//}
