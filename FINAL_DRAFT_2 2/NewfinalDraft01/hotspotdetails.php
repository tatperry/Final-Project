<?php
/**
 * Author: Kailey Hart, Tatiana Perry, Lauren Fasig
 * Date: 11/17/2020
 * File: hotspotdetails.php
 * Description: The details of the rental home
 */

//display the page header
require_once 'includes/header.php';


require_once 'includes/database.php';



//if vacation id cannot be retrieved, terminate script
if (!filter_has_var(INPUT_GET, "id")) {
    $error = "Your request cannot be processed since there was a problem retrieving the vacation_id.";
    $conn->close();
    header("Location:error.php?m=$error");
    die();
}

//retrieve the vacation id from a query string variable
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//SELECT statement
$sql = "SELECT * FROM $tblVacations WHERE vacation_id =$id";

//execute the query
$query = $conn->query($sql);

//error handling
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location:error.php?m=$error");
    die();
}

$row = $query->fetch_assoc();
if (!$row) {
    $error = "Book not found.";
    $conn->close();
    header("Location:error.php?m=$error");
    die();
}

//start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//determine the user's role
$role = 0;
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Code for the size of the web page -->
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <title>Search</title>
</head>
<body>




<!-- Main Content Area -->
<section id="maincontent">

        <h2 class="hotspots-title"> Rental Home</h2>

    <div class="vdetails">

            <div class="cover">
                <a class="go-back"  href="hotspots.php"> <button>Go Back</button></a>
                <img src="<?= $row['image'] ?>">
            </div>
            <!-- Vacation Attributes -->
            <div class="middle-row">
            <div class="label">
                <div>Product:</div>
                <div>Location:</div>
                <div>Type:</div>
                <div>Price Per Night:</div>
                <div>Description:</div>
            </div>

            <!-- Vacation details -->
            <div class="content">
                <div><?= $row['product'] ?></div>
                <div><?= $row['location'] ?></div>
                <div><?= $row['type'] ?></div>
                <div><?= $row['price_per_person'] ?>$</div>
                <div><?= $row['description'] ?></div>

            </div>
            </div>
            <div class="hotspotdetailcart" >

                <a href="addtocart.php?id=<?= $id ?>"> <img src="images/<?= $shoppingcart_img ?>" style='width: 35px; border: none'>
                    <div>Add to Cart</div></a>

            </div>
        </div>



    <?php

        $confirm="";
        if (isset($_GET['m'])) {
            if ($_GET['m'] == "insert") {
                $confirm = "You have successfully added the new book.";
            } elseif($_GET['m'] =='update') {
                $confirm = "Your book has been successfully updated.";
            }
        }

        //display these buttons only if the users role is 1
        if ($role == 1) {
    ?>



    <div class="bookstore-button">
        <input type="button" onclick="window.location.href='editvacation.php?id=<?= $id ?>'" value="Edit">
        <input type="button" onclick="window.location.href='deletevacation.php?id=<?= $id ?>'" value="Delete">
        <input type="button" onclick="window.location.href='hotspots.php'" value="Cancel">
        <div style="color: blue; display: inline-block"><?= $confirm ?></div>

    </div>

    <?php
        }
    ?>

</section>

</body>

<div class="footer">
    <p>&copy;VrGo 2020. All Rights Reserved.</p>
</div>
</html>
