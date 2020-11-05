
<?php

/**
 * Author: Jada Ruffin, Matt McGee, , ,
 * File: database.php
 * Description: Connect to the MYSQL Server
 */

//Define Parameters
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
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
