<?php
/**
 * Author: Farah Haddad
 * Date: 6/18/2020
 * File: login.php
 * Description:
 */




//include code from database.php
require_once('includes/database.php');

//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//create variable login status.
$_SESSION['login_status'] = 2;

//initialize variables for username and password
$username = $passcode = "";

//retrieve user name and password from the form in the registerform.php
if (isset($_POST['username']))
    $username = $conn->real_escape_string(trim($_POST['username']));

if (isset($_POST['password']))
    $password = $conn->real_escape_string(trim($_POST['password']));

//validate user name and password against a record in the users table in the database. If they are valid, create session variables.
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$query = $conn->query($sql);
if($query->num_rows) {
    //valid user
    $row = $query->fetch_assoc();
    //create session variables
    $_SESSION['login'] = $username;
    $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['login_status'] = 1;
}



//close the connection
$conn->close();

//redirect to the loginform.php page
header("Location: loginform.php");