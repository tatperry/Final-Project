<?php
/**
 * Author: Jada Ruffin, tatiana P., Matthew M., Farah H.
 * Date: 6/15/2020
 * File: about.php
 * Description:
 */



//display the page header
require_once 'includes/header.php';

//Do not proceed if there are no post data
if (!$_POST) {
    $error = "Direct access to this script is not allowed.";
    header("Location: error.php?m=$error");
    die();
}

//if the script did not received post data, display an error message and then terminate the script immediately
if (!filter_has_var(INPUT_POST, 'product') ||
    !filter_has_var(INPUT_POST, 'location') ||
    !filter_has_var(INPUT_POST, 'type') ||
    !filter_has_var(INPUT_POST, 'price') ||
    !filter_has_var(INPUT_POST, 'image') ||
    !filter_has_var(INPUT_POST, 'description')) {

    $error= "There were problems retrieving vacation details. New vacation cannot be added.";
    header("Location: error.php?m=$error");
    die();
}

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

//include code from database.php file
require_once('includes/database.php');

/* Retrieve vacation details.
 * For security purpose, call the built-in function real_escape_string to
 * escape special characters in a string for use in SQL statement.
 */
$product = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'product', FILTER_SANITIZE_STRING)));
$location = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING)));
$type = $conn->real_escape_string(filter_input(INPUT_POST, 'type', FILTER_DEFAULT));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));


//if type



//define the update statement
$sql = $sql = "UPDATE $tblVacations SET "
    . "product='$product', "
    . "price_per_person='$price', "
    . "type='$type', "
    . "description='$description', "
    . "location='$location', "
    . "image='$image' "
    . "WHERE vacation_id = $id";






//execute the query
$query = $conn->query($sql);

//handling errors
if (!$query) {
    $error = "Update failed: " . $conn->error;
    $conn->close();
    header("Location:error.php?m=$error");
    die();
}


//close the connection
$conn->close();
header("Location:hotspotdetails.php?id=$id&m=update");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Code for the size of the web page -->
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <title>Update</title>
</head>
<body>


<!-- Main Content Area -->
<section id="maincontent">
    <h2>Edit Vacation Details</h2>
    <form action="updatevacation.php" method="post">
        <div class="vdetails">
            <div class="label">
                <!-- display book attributes  -->
                <div>Product:</div>
                <div>Location:</div>
                <div>Type:</div>
                <div>Price Per Person:</div>
                <div>Description:</div>
            </div>

            <div class="content">
                <!-- display book details -->
                <div><input name="product" size="80" value="<?php echo $row['product'] ?>" required></div>
                <div><input name="location" value="<?php echo $row['location'] ?>" required></div>
                <div><select name="type">
                        <option value="1" <?= $row['type'] == 'Family' ? 'selected' : ''; ?>>Family</option>
                        <option value="2" <?= $row['type'] == 'Adventure' ? 'selected' : ''; ?>>Adventure</option>
                        <option value="3" <?= $row['type'] == 'Romantic' ? 'selected' : ''; ?>>Romantic</option>
                        <option value="4" <?= $row['type'] == 'Relaxation' ? 'selected' : ''; ?>>Relaxation</option>
                    </select>
                </div>
                <div><input name="price" value="<?php echo $row['price'] ?>" required></div>
                <div><input name="image" size="100" value="<?php echo $row['image'] ?>" required></div>
                <div><textarea name="description" rows="6" cols="65"><?php echo $row['description'] ?></textarea></div>
            </div>
        </div>
        <div class="bookstore-button">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input type="submit" value=" Update " />
            <input type="button" value="Cancel" onclick="window.location.href = 'hotspotdetails.php?id=<?= $id ?>'" />
        </div>
    </form>


</section>

<?php
//add your code
?>
</body>

<div class="footer">
    <p>&copy; Personal Touch Travel Agency2020. All Rights Reserved.</p>
</div>
</html>
