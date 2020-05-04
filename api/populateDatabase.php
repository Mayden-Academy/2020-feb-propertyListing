<?php

$propertyUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/properties.json";
$statusUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/statuses.json";
$typeUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/types.json";

$database = getArmadilloEstates();

//foreach ($propertyResult as $property) {
//    insertIntoPropertiesTable($database, $property);
//}

//foreach ($statusResult as $status) {
//    insertIntoStatusTable($database, $status);
//}

//foreach ($typeResult as $type) {
//    insertIntoTypesTable($database, $type);
//}

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

$propertyArray = properties($propertyUrl);
$statusArray = properties($statusUrl);
$typeArray = properties($typeUrl);

function getArmadilloEstates(): PDO
{
    $db = new PDO('mysql:host=DB;dbname=armadilloEstates', 'root', 'password');
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
    return $query->execute($propertyData);
}

function insertIntoStatusTable(PDO $db, array $statusData): bool
{
    $query = $db->prepare("INSERT INTO `status` (`StatusId`,
                                                            `StatusName`) 
                                                        VALUES (:ID, 
                                                                :STATUS_NAME);");
    return $query->execute($statusData);
}

function insertIntoTypesTable(PDO $db, array $typeData): bool
{
    $query = $db->prepare("INSERT INTO `types` (`TypeId`,
                                                            `TypeName`) 
                                                        VALUES (:ID, 
                                                                :TYPE_NAME);");
    return $query->execute($typeData);
}



function validateUsrInput(array $newBread) :bool
{
    return (
        !empty($newBread['imgurl']) &&
        !empty($newBread['name']) &&
        !empty($newBread['type']) &&
        !empty($newBread['rating']) &&
        !empty($newBread['desc'])
    );
}