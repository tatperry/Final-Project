<?php
/**
 * Author: Farah Haddad
 * Date: 6/18/2020
 * File: logout.php
 * Description: logout page
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//unset session variables
$_SESSION = array();

//delete the session cookie
setcookie(session_name(), "", time()-60);

//destroy the session
session_destroy();

$page_title = "Personal Touch Travel Agency Logout";
include_once "includes/header.php";
?>
<h2 style="color: #eeeeee">Logout</h2>
<p style="color: #eeeeee">Thank you for your visit. You are now logged out.</p>
<?php
include_once 'includes/footer.php';