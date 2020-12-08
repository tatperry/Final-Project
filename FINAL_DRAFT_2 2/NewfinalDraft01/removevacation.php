<?php
/**
 * Author: Kailey hart, Lauren Fasig, Tatiana Perry
 * Date: 11/17/2020
 * File: removevaction.php
 * Description:Remove vacation logic
 */

//display the page header
require_once 'includes/header.php';


require_once('includes/database.php');

//if vacation id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, 'id')) {
    $error = "There was a problem retrieving vacation id.";
    header("Location: error.php?m=$error");
    die();
}



$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//sql statement
$sql = "DELETE FROM $tblVacations WHERE vacation_id=$id";




//execute the query
$query = $conn->query($sql);



//handling errors
if (!$query) {
    $error = "Deletion failed: " . $conn->error;
    $conn->close();
    header("Location:error.php?m=$error");
    die();
}

echo "<p> The vacation has been successfully deleted from the database.";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Code for the size of the web page -->
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <title>Remove Vacation</title>
</head>
<body>



<!-- Main Content Area -->
<section id="maincontent">
    <div class="container">

        <!-- Main Content Area -->
        <section id="maincontent">
            <div class="container">
                <!-- Main Content Area -->
                <section id="maincontent">
                    <div class="container">
                        <h2> Vacation</h2>
                        <div class="vdetails">

                            <div class="cover">
                                <img src="images/<?= $row['image'] ?>">
                            </div>
                            <!-- Vacation Attributes -->
                            <div class="label">
                                <div>Product:</div>
                                <div>Location:</div>
                                <div>Type:</div>
                                <div>Price Per Person:</div>
                                <div>Description:</div>
                            </div>

                            <!-- Vacation details -->
                            <div class="content">
                                <div><?= $row['product'] ?></div>
                                <div><?= $row['location'] ?></div>
                                <div><?= $row['type'] ?></div>
                                <div><?= $row['price_per_person'] ?></div>
                                <div><?= $row['description'] ?></div>

                            </div>

                        </div>

                    </div>

            </div>
            <div class="bookstore-button">
                <input type="submit" onclick="window.location.href='editvacation.php?id=<?= $id ?>'" value="Edit">
                <input type="submit" onclick="window.location.href='deletevacation.php?id=<?= $id ?>'" value="Delete">
                <input type="submit" onclick="window.location.href='hotspots.php'" value="Cancel">


            </div>


    </div>


</section>

<?php
//add your code
?>
</body>

<div class="footer">
    <p>&copy;VrGo 2020. All Rights Reserved.</p>
</div>
</html>