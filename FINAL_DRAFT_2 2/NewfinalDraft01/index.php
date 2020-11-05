<?php
/**
 * Author: Jada Ruffin, tatiana P., Matthew M., Farah H.
 * Date: 6/15/2020
 * File: index.php
 * Description:
 */

//display the page header
require_once 'includes/header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Code for the size of the web page -->
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <title>Home</title>
</head>
<body>



<!-- Main Content Area -->
<section id="maincontent">
    <div class="container">
        <h1>Explore a new world with Personal Touch Travel</h1>
        <!-- Replace this code with some meaningful text about the travel agency -->
        <p>When you're ready to getaway, we're ready to inspire you.</p>
    </div>

    <div class="container">

        <!-- Section for  Top Pick bottom boxes -->
        <section id="boxes">

            <div class="top-picks">
                <!-- Adventure Top Pick box -->
                <div class="box">
                    <img class="resize" src="images/adventure.jpg" style="border: 2px solid #3B506B">
                    <h3>Adventure</h3>
                </div>

                <!-- Family Top Pick box -->
                <div class="box">
                    <img class="resize" src="images/family.jpg" style="border: 2px solid #3B506B">
                    <h3>Family</h3>
                </div>

                <!-- Romantic Top Pick box -->
                <div class="box">
                    <img class="resize" src="images/romantic.jpg" style="border: 2px solid #3B506B">
                    <h3>Romantic</h3>
                </div>

                <!-- Relaxation Top Pick box -->
                <div class="box">
                    <img class="resize" src="images/relaxing.jpg" style="border: 2px solid #3B506B">
                    <h3>Relaxation</h3>
                </div>
            </div>

        </section>
<?php
//add your code
?>
</body>

<!--footer -->
<div class="footer">
    <p>&copy; Personal Touch Travel Agency2020. All Rights Reserved.</p>
</div>
</html>
