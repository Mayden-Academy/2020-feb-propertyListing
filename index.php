<?php
    require ("vendor/autoload.php");
    $db = \ArmadilloEstates\Database\Database::connect();
    $hydrator = new \ArmadilloEstates\Hydrators\PropertyHydrator($db);
    $allProperties = $hydrator->getAllBasicProperties();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Armadillo Estates</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="./img/logo.png" class="d-inline-block align-top logoimg" alt="">
            </a>
            <h2>Armadillo Estates</h2>
            <div class="stabilizerDiv"></div><!-- this empty div is required for the positioning of the h2 above-->
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php
            echo \ArmadilloEstates\ViewHelpers\PropertyViewHelper::displayAll($allProperties);
            ?>
        </div>
    </div>
</body>
</html>
