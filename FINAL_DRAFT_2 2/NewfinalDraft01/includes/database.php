
<?php

/**
 * Author: Tatiana Perry, Kailey Hart, Lauren Fasig
 * File: database.php
 * Description: Connect to the MYSQL Server
 */

//Define Parameters
$host = "localhost";
$login = "phpuser";
$password = "XZ7ro4kMGgeGXS9J";
$database = "travel_db";
$tblCustomer = "customer";
$tblOrderinfo = "orderinfo";
$tblVacations = "vacations";
$tblUser = "users";

//connect to the MYSQL Server
$conn = @new mysqli( $host, $login, $password, $database);



//handling errors
if ($conn ->connect_errno) {
 $error = $conn->connect_error;
 header("Location:error.php?m=$error");
 die();
}


 ?>
