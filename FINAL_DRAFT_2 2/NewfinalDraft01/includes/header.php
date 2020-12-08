<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//number of items in the shopping cart
$count = 0;

//retrieve cart content
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    if ($cart) {
        $count = array_sum($cart);
    }
}

//set shopping cart image
$shoppingcart_img = (!$count) ? "shoppingcart_empty.png" : "shoppingcart_full.png";

//variables for user's login, name, and role (might need to change)
$login = $name = $role = 0;


if (isset($_SESSION['role']) and isset($_SESSION['login']) and isset($_SESSION['name'])) {
    $login = $_SESSION['login'];
    $name = $_SESSION['name'];
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">

</head>
<body>


<header>

    <!--    Logo and cart for the header-->

    <!--     Logo image and banner text -->
    <div id="banner">
        <div class="logo">
           <a href="index.php">  <img src="images/newLogo.png" style=" width: 200px;height: auto;" alt="VrGo"></a>
        </div>


        <!--Navigation Menu -->
        <div id="nav-container">
            <div id="navbar">


                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="hotspots.php">Hot Spots</a>
                <a href="contact.php">Contact</a>
                <a href="search.php">Search</a>
                <?php

                if ($role == 1) {
                    echo "<a href='addvacation.php'>Add Vacation ||</a>";
                }
                if (empty($login)) {
                    echo "<a href='loginform.php'>Login</a>";
                } else {
                    echo "<a href='logout.php'>Logout</a>";
                    echo "<span style='color: #5BC1BE; margin-left: 30px'>Welcome $name!</span>";
                }

                ?>

                <!-- <a href="loginform.php">Login</a> || -->

            </div>

            <!--shopping cart picture-->
            <div class="shoppingcart">
                <a href="vacationshowcart.php">
                    <img src="images/<?= $shoppingcart_img ?>" style='width: 35px; border: none'>
                    <div><?= $count ?> item(s)</div>
                </a>
            </div>
        </div>

    </div>
</header>
</body>
