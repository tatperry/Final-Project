<?php
/**
 * Author: Kailey Hart, Tatiana Perry, Lauren Fasig
 * Date: 11/17/2020
 * File: about.php
 * Description: Add a Vacation
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
    <title>Add Vacation</title>
</head>
<body>




<!-- Main Content Area -->
<section id="maincontent">
    <div class="container">


        <div class="addvacations_background">
        <h2>Add New Vacation</h2>
        <form action="insertvacation.php" method="post">
            <table cellspacing="0" cellpadding="3" style="border: none; padding:5px; margin-top: 10px">
                <tr>
                    <td style="text-align: left; width: 100px; font-weight: 700; padding-left: 20px;">Product: </td>
                    <td><input name="product" type="text" size="100" required /></td>
                </tr>
                <tr>
                    <td style="text-align: left; font-weight: 700; padding-left: 20px;">Location: </td>
                    <td><input name="location" type="text" size="40" required /></td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 20px; font-weight: 700;">Type:</td>
                    <td>
                        <select name="type">
                            <option value="1">Family</option>
                            <option value="2">Adventure</option>
                            <option value="3">Romantic</option>
                            <option value="4">Relaxation</option>
                        </select>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td style="text-align: left;padding-left: 20px; font-weight: 700">Price: </td>
                    <td><input name="price" type="number" step="0.01" required /></td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 20px; font-weight: 700">Image: </td>
                    <td><input name="image" type="text" size="100" required /></td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 20px;font-weight: 700; vertical-align: top">Description:</td>
                    <td><textarea name="description" rows="6" cols="65"></textarea></td>
                </tr>
            </table>
        </div>

            <div class="bookstore-button">
                <input type="submit" value="Add " />
                <input type="submit" value="Cancel" onclick="window.location.href='hotspots.php'" />
            </div>
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