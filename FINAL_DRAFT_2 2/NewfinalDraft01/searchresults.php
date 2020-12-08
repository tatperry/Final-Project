<?php
/**
 * Author: Kailey Hart, Lauren Fasig, Tatiana Perry
 * Date: 11/17/2020
 * File: searchresults.php
 * Description: Search Results
 */


//display the page header
require_once 'includes/header.php';


require_once 'includes/database.php';


//retrieve search terms
if (!filter_has_var(INPUT_GET, 'q')) {
    $error = "There was no search terms found.";
    $conn->close();
    header("Location:error.php?m=$error");
    die();
}

$term = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);


//EXPLODE search terms into an array
$terms = explode(' ', $term);

//select statement using the pattern search

$sql = "SELECT vacation_id, product, location, type, price_per_person
        FROM $tblVacations 
        WHERE ";
foreach ($terms as $t) {
    $sql .= "location LIKE '%$t%' AND ";
}


//trimming off the AND "
$sql = rtrim($sql, "AND ");


//execute the query
$query = $conn->query($sql);


//handling errors
if (!$query) {
    $error = "Select failed: " . $conn->error;
    $conn->close();
    header("Location:error.php?m=$error");
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
    <title>Search</title>
</head>
<body>


<!-- Main Content Area -->
<section id="maincontent">


    <!-- Search Bar -->
    <h2>Search results for: <?= $term ?></h2>
    <?php
    if ($query->num_rows == 0) {
        echo "Your search '$term' did not match any rentals in our inventory.";
        exit();
    }

    ?>
    <p>Enter one or more words</p>
    <form action="searchresults.php" method="get">
        <input type="text" name="q" size="40" required/>&nbsp;&nbsp;
        <input type="submit" name="Submit" id="Submit" value="Search Vacations"/>
    </form>


    <div class="travellist">
        <div class="row header">
            <div class="col1">Product</div>
            <div class="col2">Location</div>
            <div class="col3">Type</div>
            <div class="col4">Price</div>
        </div>

        <?php
        while ($row = $query->fetch_assoc()) {

            ?>

            <div class="row">
                <div class="col1"><a href="hotspotdetails.php?id=<?= $row['vacation_id'] ?>"><?= $row['product'] ?></a></div>
                <div class="col2"><?= $row['location'] ?></div>
                <div class="col3"><?= $row['type'] ?></div>
                <div class="col4"><?= $row['price_per_person'] ?></div>
            </div>


            <?php
        }
        ?>


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

