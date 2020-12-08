<?php
/**
 * Author: Tatiana Perry, Lauren Fasig, Kailey Hart
 * Date: 11/17/2020
 * File: hotspots.php
 * Description: Rentals
 */

//display the page header
require_once 'includes/header.php';

require_once 'includes/database.php';

//retrieve the vacation id from a query string variable
$id = filter_input(INPUT_GET, 'vacation_id', FILTER_SANITIZE_NUMBER_INT);

//select statement
//$sql = "SELECT product, location, type, price_per_person FROM $tblVacations";

//select statement to retrieve product, location, type, price id
$sql = "SELECT product, location, type, price_per_person, vacation_id FROM $tblVacations";

//execute the query
$query = $conn->query($sql);

//handle errors
if (!$query) {
    $error = "Selection Failed: " . $conn->error;
    header("Location:error.php?m=$error");
    $conn->close();
    die();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Code for the size of the web page -->
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <title>Hotspots</title>
</head>
<body>



<!-- Main Content Area -->
<section id="maincontent">

    <div class="container">
        <h2 class="hotspots-title">Rentals</h2>
        <div class="travellist">
            <div class="row header">
                <div class="col1">Product</div>
                <div class="col2">Location</div>
                <div class="col3">Type</div>
                <div class="col4">Price</div>
            </div>


            <!-- php code to display the vacation information -->
            <?php

            while ($row = $query->fetch_assoc()) {


                ?>
                <div class="row">
                    <div class="col1"><a
                                href="hotspotdetails.php?id=<?= $row['vacation_id'] ?>"><?= $row['product'] ?></a></div>
                    <div class="col2"><?= $row['location'] ?></div>
                    <div class="col3"><?= $row['type'] ?></div>
                    <div class="col4"><?= $row['price_per_person'] ?>$</div>
                </div>


                <?php
            }

            ?>


        </div>


    </div>

    </div>


</section>

</body>
<div class="footer">
    <p>&copy;VrGo 2020. All Rights Reserved.</p>
</div>
</html>
