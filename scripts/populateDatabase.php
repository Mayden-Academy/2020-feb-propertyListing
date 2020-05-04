<?php

$propertyUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/properties.json";
$statusUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/statuses.json";
$typeUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/types.json";

$database = getArmadilloEstates();

$propertyArray = getApiData($propertyUrl);
$statusArray = getApiData($statusUrl);
$typeArray = getApiData($typeUrl);

$database->query("TRUNCATE TABLE `properties`");
foreach ($propertyArray as $property) {
    insertIntoPropertiesTable($database, $property);
}

$database->query("TRUNCATE TABLE `status`");
foreach ($statusArray as $status) {
    insertIntoStatusTable($database, $status);
}

$database->query("TRUNCATE TABLE `types`");
foreach ($typeArray as $type) {
    insertIntoTypesTable($database, $type);
}

function getApiData($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);
    $result = json_decode($output, true);
    curl_close($ch);

    return $result;
}

function getArmadilloEstates(): PDO
{
    $db = new PDO('mysql:host=DB;dbname=armadilloEstates', 'root', 'password');
    return $db;
}

function insertIntoPropertiesTable(PDO $db, array $propertyData): bool
{
    $query = $db->prepare("INSERT INTO `properties` (
                                                                `agentRef`,
                                                                `address1`,
                                                                `address2`,
                                                                `town`,
                                                                `postcode`, 
                                                                `description`, 
                                                                `beds`, 
                                                                `price`, 
                                                                `image`, 
                                                                `propertyType`, 
                                                                `status`
                                                                ) 
                                                        VALUES (
                                                                :AGENT_REF, 
                                                                :ADDRESS_1, 
                                                                :ADDRESS_2, 
                                                                :TOWN, 
                                                                :POSTCODE, 
                                                                :DESCRIPTION, 
                                                                :BEDROOMS, 
                                                                :PRICE, 
                                                                :IMAGE, 
                                                                :TYPE, 
                                                                :STATUS
                                                                );"
                                                        );
    return $query->execute($propertyData);
}

function insertIntoStatusTable(PDO $db, array $statusData): bool
{
    $query = $db->prepare("INSERT INTO `status` (`statusId`, `statusName`) VALUES (:ID, :STATUS_NAME);");
    return $query->execute($statusData);
}

function insertIntoTypesTable(PDO $db, array $typeData): bool
{
    $query = $db->prepare("INSERT INTO `types` (`typeId`, `typeName`) VALUES (:ID, :TYPE_NAME);");
    return $query->execute($typeData);
}

