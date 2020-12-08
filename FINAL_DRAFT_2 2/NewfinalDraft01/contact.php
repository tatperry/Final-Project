<?php
/**
 *
 * Author: Kailey Hart, Tatiana Perry, Lauren Fasig
 * Date: 11/17/2020
 * File: contact.php
 * Description: Contact Page
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
    <title>Contact</title>
</head>
<body>



<!-- Main Content Area -->
<section id="maincontent">
    <div class="container">


        <!-- HEADER FOR CONTACT PAGE -->
        <div class="contact">
            <h2>Contact Us</h2>
        </div>
        <br>
        <br>


        <!-- Contact Form starts here -->
        <div class="Container-contact">
            <form action="contact.php">
                <!-- FIRST NAME FILL IN  -->
                <label for="fname">First Name</label><br>
                <input
                        type="text"
                        id="fname"
                        name="firstname"
                        placeholder="Your first name.."
                />
                <br>
                <!-- LAST NAME FILL IN -->
                <label for="lname">Last Name</label><br>
                <input
                        type="text"
                        id="lname"
                        name="lastname"
                        placeholder="Your last name.."
                />
                <br>
                <!-- COUNTRY FILL IN -->
                <label for="country">Country</label><br>
                <select id="country" name="country">
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                </select>
                <br>
                <!-- COMMENTS FILL IN -->
                <label for="subject">Subject</label>
                <br>
                <textarea
                        id="subject"
                        name="subject"
                        placeholder="Write something.."
                        style="height: 50px;"
                ></textarea><br>
                <!-- SUBMIT BUTTON -->
                <input type="submit" value="Submit" onclick="window.location.href = 'submitcontact.php'"/><br>

            </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

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
