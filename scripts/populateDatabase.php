<?php

$propertyUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/properties.json";
$statusUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/statuses.json";
$typeUrl = "https://dev.maydenacademy.co.uk/resources/property-feed/types.json";

$database = connectToDatabase();

$allProperties = getApiData($propertyUrl);
$allStatuses = getApiData($statusUrl);
$allTypes = getApiData($typeUrl);

$databaseData = [['data'=>$allProperties, 'tableName'=>'properties'],
    ['data'=>$allStatuses, 'tableName'=>'status'],
    ['data'=>$allTypes, 'tableName'=>'types']];

foreach ($databaseData as $tableData) {
    $query = $database->query("TRUNCATE TABLE `$tableData['tableName']`");
    switch ($tableData['tableName']) {
        case 'properties':
            foreach ($tableData['data'] as $data) {
                insertIntoPropertiesTable($database, $data);
            }
            break;
        case 'status':
            foreach ($allStatuses as $status) {
                insertIntoStatusTable($database, $status);
            }
            break;
        case 'types':
            foreach ($allTypes as $type) {
                insertIntoTypesTable($database, $type);
            }
    }
}

function getApiData(string $url): array
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);
    $result = json_decode($output, true);
    curl_close($ch);

    return $result;
}

function connectToDatabase(): PDO
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


