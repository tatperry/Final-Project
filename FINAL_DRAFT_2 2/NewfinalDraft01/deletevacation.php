<?php
/**
 * Author: Jada Ruffin, tatiana P., Matthew M., Farah H.
 * Date: 6/15/2020
 * File: about.php
 * Description:
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
//determine vacation id
$id = $conn->insert_id;


//retrieve book id from a query string variable.
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//MySQL SELECT statement
$sql = "SELECT * FROM $tblVacations WHERE vacation_id=$id";


//execute the query
$query = @$conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$row = $query->fetch_assoc();
if (!$row) {
    $error = "Vacation not found";
    $conn->close();
    header("Location: error.php?m=$error");
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
    <title>Delete Vacation</title>
</head>
<body>


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
        <input type="button" onclick="window.location.href='updatevacation.php?id=<?= $id ?>'" value="Edit">
        <input type="button" onclick="window.location.href='removevacation.php?id=<?= $id ?>'" value="Delete">
        <input type="button" onclick="window.location.href='hotspots.php'" value="Cancel">


    </div>

</section>

<?php
//add your code
?>
</body>

<div class="footer">
    <p>&copy; Personal Touch Travel Agency2020. All Rights Reserved.</p>
</div>
</html>
