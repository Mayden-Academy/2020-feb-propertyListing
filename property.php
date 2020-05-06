<?php
require ("vendor/autoload.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    header("Location: index.php");
    die();
}

try {
    $db = \ArmadilloEstates\Database\Database::connect();
    $hydrator = new \ArmadilloEstates\Hydrators\PropertyHydrator($db);
    $property = $hydrator->getCompleteListingById($id);
    $displayCards = \ArmadilloEstates\ViewHelpers\PropertyViewHelper::displayOne($property);
} catch (Throwable $error) {
    $displayCards = "<h3>Invalid Link! Please head back to the main page</h3>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Armadillo Estates</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet"/>
</head>
<body>
    <nav class="navbar navbar-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="./img/logo.png" class="d-inline-block align-top logoimg" alt="Logo">
            </a>
            <h2>Armadillo Estates</h2>
            <div class="stabilizerDiv"></div><!-- this empty div is required for the positioning of the h2 above-->
        </div>
    </nav>
    <div class="container mb-4">
        <div class="row">
            <?php
            echo $displayCards;
            ?>
            <div class="col-12 d-flex justify-content-center">
                <a class="btn btn-primary" href="index.php">Back</a>
            </div>
        </div>
    </div>
</body>
</html>
