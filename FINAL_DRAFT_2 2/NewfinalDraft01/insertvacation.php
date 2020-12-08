<?php
/**
 * Author: Kailey Hart, Lauren Fasig, Tatiana Perry
 * Date:11/17/2020
 * File: insertvacation.php
 * Description: vaction logic
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

//include code from database.php file
require_once('includes/database.php');

/* Retrieve book details.
 * For security purpose, call the built-in function real_escape_string to
 * escape special characters in a string for use in SQL statement.
 */
$product = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'product', FILTER_SANITIZE_STRING)));
$location = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING)));
$type = $conn->real_escape_string(filter_input(INPUT_POST, 'type', FILTER_DEFAULT));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

//defining the insert statement, organization must be the same as the database
$sql = "INSERT INTO $tblVacations VALUES (NULL, '$product', '$price', '$type', '$description', '$location', '$image')";


//execute the query
$query = @$conn->query($sql);

//handle the errors
if (!$query) {
    $error ="Insertion failed: " . $conn->error;
    $conn->close();
    header("Location:error.php?m=$error");
    die();
}

//determine vacation id
$id = $conn->insert_id;

//close the database connection
$conn->close();
header("Location:hotspotdetails.php?id=$id&m=insert");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Code for the size of the web page -->
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <title>Insert Vacation</title>
</head>
<body>



<!-- Main Content Area -->
<section id="maincontent">
    <div class="container">


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
