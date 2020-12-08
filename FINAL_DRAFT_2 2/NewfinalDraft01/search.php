<?php
/**
 * Author: Tatiana Perry, Kailey Hart,Lauren Fasig
 * Date: 11/17/2020
 * File: search.php
 * Description: Search Page
 */

//display the page header
require_once 'includes/header.php';

require_once 'includes/database.php';


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
    <div class="Search">


        <!-- Search Bar -->

        <p>Enter one or more words</p>
        <form action="searchresults.php" method="get">
            <input type="text" name="q" size="40" required/>&nbsp;&nbsp;
            <input type="submit" name="Submit" id="Submit" value="Search Vacations"/>
        </form>


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
