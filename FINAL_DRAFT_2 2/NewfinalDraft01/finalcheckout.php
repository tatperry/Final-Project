<?php
/**
 * Author: Jada Ruffin
 * Date: 6/19/2020
 * File: finalcheckout.php
 * Description: Confirmation page after customer has clicked the checkout button
 */

//display the page header
require_once 'includes/header.php';

//start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//login information
if(!isset($_SESSION['login'])) {
    header("Location:loginform.php");
    exit;
}

//empty the shopping cart
$_SESSION['cart'] = array();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Code for the size of the web page -->
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <title>Checkout</title>
</head>
<body>
<h2 style="color: #FFFFFF">Checkout</h2>
<p style="color: #FFFFFF">Thank you for shopping with us. Your business is greatly appreciated. You will be notified once your items are shipped.</p>



<?php
//add your code
?>
</body>
</html>
