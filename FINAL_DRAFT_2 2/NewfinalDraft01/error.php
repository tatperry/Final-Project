<?php
/**
 * Author: Kailey Hart, Tatiana Perry, Lauren Fasig
 * Date: 11/17/2020
 * File: error.php
 * Description: Error search page
 */

//display the page header
require_once 'includes/header.php';


$error='Default error.';
if (filter_has_var(INPUT_GET, "m")) {
    $error = filter_input(INPUT_GET, 'm', FILTER_SANITIZE_STRING);
}

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
    <div class="container">
        <h2 style="color: #eeeeee">Error</h2>

        <table style="width: 100%; border: none">
            <tr>
                <td style="vertical-align: middle; text-align: center; width:100px">
                    <img src='images/error.png' style="width: 80px; border: none"/>
                </td>
                <td style="text-align: left; vertical-align: top;">
                    <h3 style="color: #eeeeee">Sorry, but an error has occurred.</h3>
                    <div style="color: red">
                        <?= $error ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <br><br><br><br><br>

    </div>


</section>
<body>






<?php

?>
</body>

<div class="footer">
    <p>&copy;VrGo 2020. All Rights Reserved.</p>
</div>
</html>
