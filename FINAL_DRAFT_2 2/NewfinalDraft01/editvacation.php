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

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    $error = "Your request cannot be processed since there was a problem retrieving vacations id.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

//determine vacation id
$id = $conn->insert_id;


//retrieve book id from a query string variable.
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//MySQL SELECT statement
$sql = "SELECT * 
      FROM $tblVacations
      WHERE vacation_id=$id";


//execute the query
$query = @$conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Edit failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$row = $query->fetch_assoc();
if (!$row) {
    $error = "Edit not found";
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
    <title>About</title>
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
                    <div><input name="price" value="<?php echo $row['price_per_person'] ?>" required></div>
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