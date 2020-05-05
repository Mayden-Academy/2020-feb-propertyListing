<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require ("vendor/autoload.php");
    $id = $_GET["id"];
    $db = \ArmadilloEstates\Database\Database::connect();
    $hydrator = new \ArmadilloEstates\Hydrators\PropertyHydrator($db);
    $property = $hydrator->getCompleteListingById($id);
    ?>
    <meta charset="UTF-8">
    <title>Armadillo Estates</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>
<body>
<div class="container">
    <nav class=“navbar navbar-light bg-light mb-4”>
        <div class=“container”>
            <a class=“navbar-brand” href=“#”>
                <img src=“./img/logo.png” height=“40"
                     class=“d-inline-block align-top” alt=“”>
            </a>
            <h2>Armadillo Estates</h2>
            <div></div><!-- this empty div is required for the positioning of the h2 above-->
        </div>
    </nav>
</div>
<div class="container mb-4">
    <div class="row">
        <?php
        echo \ArmadilloEstates\ViewHelpers\PropertyViewHelper::displayOne($property);
        ?>
        <div class="col-12 d-flex justify-content-center">
            <a class="btn btn-primary" href="index.php" >Back</a>
        </div>
    </div>
</div>
</body>
</html>
