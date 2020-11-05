 <?php



if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//number of items in the shopping cart
$count=0;

//retrieve cart content
if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    if($cart) {
        $count = array_sum($cart);
    }
}

//set shopping cart image
$shoppingcart_img = (!$count) ? "shoppingcart_empty.png" : "shoppingcart_full.png";

//variables for user's login, name, and role (might need to change)
$login = $name = $role = 0;


if(isset($_SESSION['role']) AND isset($_SESSION['login']) AND isset($_SESSION['name'])) {
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

</head>
<body>



<header>

<!--    Logo and cart for the header-->

    <!--     Logo image and banner text -->
  <div id="banner">
      <div class="logo">
          <img src="images/logo.jpg" style="padding: 0px 0px 20px 0px" alt="Personal Touch Travel Agency">
     </div>


  <div class="banner-text">
         <div id="maintitle">Personal Touch Travel Agency</div>
<!--          <div id="subtitle">Learn how to build an online bookstore <br>with PHP and MySQL</div>-->
    </div>




<!--         Navigation Menu -->

        <div id="navbar">


            <a href="index.php">Home</a>  ||
            <a href="about.php">About</a> ||
            <a href="hotspots.php">Hot Spots</a> ||
            <a href="contact.php">Contact</a> ||
            <a href="search.php">Search</a> ||
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
                <img src="images/<?= $shoppingcart_img ?>" style='width: 50px; border: none'>
                <div><?= $count ?> item(s)</div>
            </a>
        </div>

  </div>
</header>
</body>
