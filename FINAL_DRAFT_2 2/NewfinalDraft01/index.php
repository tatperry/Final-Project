<?php
/**
 * Author: Tatiana Perry, Kailey Hart,
 * Date: 11/17/2020
 * File: index.php
 * Description: Home Page
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
        <h1>Explore a new world <br> with VrGo</h1>
        <!-- Replace this code with some meaningful text about the travel agency -->
        <p>When you're ready to getaway, we're ready to inspire you.</p>
    </div>

    <div class="container">

        <!-- Section for  Top Pick bottom boxes -->
        <section id="boxes">

            <div class="top-picks">
                <!-- Adventure Top Pick box -->
                <div class="box" >
                    <div class="resize-adventure"  style="border: 2px solid #3B506B"></div>
                    <h3>Adventure</h3>
                </div>

                <!-- Family Top Pick box -->
                <div class="box" >
                    <div  class="resize-family" style="border: 2px solid #3B506B"></div>
                    <h3>Family</h3>
                </div>

                <!-- Romantic Top Pick box -->
                <div class="box">
                    <div  class="resize-romantic"  style="border: 2px solid #3B506B"> </div>
                    <h3>Romantic</h3>
                </div>

                <!-- Relaxation Top Pick box -->
                <div class="box" >
                    <div  class="resize-friends" style="border: 2px solid #3B506B"> </div>
                    <h3>Friends</h3>
                </div>
            </div>

        </section>
<?php
//add your code
?>
</body>

<!--footer -->
<div class="footer">
    <p>&copy;VrGo 2020. All Rights Reserved.</p>
</div>
</html>
