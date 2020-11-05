<?php
/**
 * Author: Jada Ruffin, tatiana P., Matthew M., Farah H.
 * Date: 6/15/2020
 * File: addtocart.php
 * Description: adding books into the cart
 */




    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }


    //check for session variable named cart
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    } else {
        $cart = array();
    }

    //retrieve vacation id
    $id= '';

    if (filter_has_var(INPUT_GET, 'id')) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    }

    //error handling
    if ($id == false) {
        $error = "Invalid vacation id detected. Operation cannot proceed.";
        header("Location:error.php?m=$error");
        die();
    }

    //determine if the id already exists in the array
    if (array_key_exists($id, $cart)) {
        $cart[$id] = $cart[$id] + 1;
    } else {
        $cart[$id] = 1;
    }

    //update the session variable
    $_SESSION['cart'] = $cart;


    //redirect user to the vacationshowcart.php
    header("Location:vacationshowcart.php");




    //login information
    if(!isset($_SESSION['login'])) {
    header("Location:loginform.php");
    exit;
    }



    //set page title
    $page_title = "Checkout";

    //display the page header
    require_once 'includes/header.php';
    ?>



<?php
require_once 'includes/footer.php';
