<?php
/**
 * Author: Farah Haddad
 * Date: 6/18/2020
 * File: loginform.php
 * Description:
 * 1 -- last login attempt success
 * 2 -- last login attempt failed
 * 3 -- user just registered. Logged in automatically.
 */

$page_title = "Personal Touch Travel Agency Login";
require_once('includes/header.php');
?>
    <title>Login</title>

    <div class="login">
        <h2>Login or Register</h2>
    </div>

<?php
$message = "Please enter your username and password to login.";

$login_status = '';
if(isset($_SESSION['login_status'])) {
    $login_status = $_SESSION['login_status'];
}

//the user's last login attempt succedded
if($login_status == 1) {
    echo "<p style='color: #eeeeee'>You are logged in as " . $_SESSION['login'] . ".</p>";
    echo "<a style='color: #eeeeee'href='logout.php'>Log out</a><br>";
    include_once 'includes/footer.php';
    exit;
}

//the user's last login attempt failed
if($login_status == 2) {
    $message = "Username or password invalid. Please try again.";
}

//user has just registered
if($login_status == 3) {
    echo "<p style='color: #eeeeee'>Thank you for registering with us. Your account has been created.</p>";
    echo "<a style='color: #eeeeee' href='logout.php'>Log out</a><br>";
    include_once 'includes/footer.php';
    exit;
}

?>

<!-- Main Content Area -->
<section id="maincontent">
    <div class="container">
        <!-- Header for Login page -->
<!--        <div class="login">-->
<!--            <h2>Login or Register</h2>-->
<!--        </div>-->


        <div class="Container-login">

            <form method='post' action='login.php'>
                <label>If you are a returning user, please log in</label>
                <br>
                <br>
                <br>
                <label for="username">Username</label><br>
                <input type='text' name='username' required>
                <br>
                <label for="password">Password</label><br>
                <input type='password' name='password' required>
                <br>
                <input type='submit' value='Login' /><br>
                <br>
                <br>
                <br>
            </form>

            <!-- display the registration form -->

            <form method="post" action="register.php">
                <label>If you are new to our site, please create an account.</label>
                <br>
                <br>
                <br>
                <label for="firstname">First Name: </label><br>
                <input type='text' name='firstname' required>
                <br>
                <label for="lastname">Last Name: </label><br>
                <input type='text' name='lastname' required>
                <br>
                <label for="username">Username: </label><br>
                <input type='text' name='username' required>
                <br>
                <label for="password">Password</label><br>
                <input type='password' name='password' required>
                <br>
                <input type='submit' value='Register'/><br>
                </form>
                <br>
                <br>
                <br>
                <br>

        </div>
    </div>
</section>

<?php
include('includes/footer.php');



