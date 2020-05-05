<?php
    require ("vendor/autoload.php");
    $db = \ArmadilloEstates\Database\Database::connect();
    $hydrator = new \ArmadilloEstates\Hydrators\PropertyHydrator($db);
    $allProperties = $hydrator->getAllBasicProperties();
?>

<!DOCTYPE html>
<head lang="en">
<head>
    <meta charset="UTF-8">
    <title>Armadillo Estates</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
</head>
<body>
<nav class="navbar navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="./img/logo.png" height="40"
                 class="d-inline-block align-top" alt="">
        </a>
        <h2>Armadillo Estates</h2>
        <div></div><!-- this empty div is required for the positioning of the h2 above-->
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
