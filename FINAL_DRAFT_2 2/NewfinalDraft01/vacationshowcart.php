<?php
/**
 * Author: Jada Ruffin
 * Date: 6/19/2020
 * File: vacationshowcart.php
 * Description:
 */

//display the page header
require_once 'includes/header.php';
require_once('includes/database.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Code for the size of the web page -->
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <title>Cart</title>
</head>
<body>


<!-- Main Content Area -->
<section id="maincontent">
    <div class="container">
        <h2> My Shopping Cart</h2>
        <!--  display shopping cart content -->
        <div class="travellist">
            <div class="row header">
                <div class="col1">Product</div>
                <div class="col2">Price</div>
                <div class="col3">Quantity</div>
                <div class="col4">Subtotal</div>
            </div>

            <?php
            //select statement
            $sql = "SELECT vacation_id, product, price_per_person FROM vacations  WHERE 0 ";
            foreach (array_keys($cart) as $id) {
                $sql .= " OR vacation_id=$id";
            }


            //execute the query
            $query = $conn->query($sql);

            //fetch books
            while ($row = $query->fetch_assoc()) {
                $id = $row['vacation_id'];
                $product = $row['product'];
                $price = $row['price_per_person'];
                $qty = $cart[$id];
                $subtotal = $qty * $price;


            ?>
                <div class="row">
                    <div class="col1"><a href='hotspotdetails.php?id=<?= $id ?>'><?= $product ?></a></div>
                    <div class="col2">$<?= $price ?></div>
                    <div class="col3"><?= $qty ?></div>
                    <div class="col4">$<?php printf("%.2f", $subtotal); ?></div>
                </div>

            <?php } ?>

            </div>

        </div>


</section>


<div class="bookstore-button">
    <input type="button" value="Checkout" onclick="window.location.href = 'finalcheckout.php'"/>
    <input type="button" value="Cancel" onclick="window.location.href = 'hotspots.php'"/>
</div>
<br><br>
<body>


</body>

<div class="footer">
    <p>&copy; Personal Touch Travel Agency2020. All Rights Reserved.</p>
</div>
</html>