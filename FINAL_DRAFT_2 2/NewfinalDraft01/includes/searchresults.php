<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once 'includes/database.php';

//retrieve search term
//error handling
/*    $error = "There was no search terms found.";
    $conn->close();
    header(":error.php? m= $error");
    die();
}*/

$term = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);

//explode the search terms into an array
$terms = explode( ' ', $term);

//select statement using patterns search
$sql = "SELECT *
        FROM $tblVacations
        WHERE $tblVacations.vacation_id  AND ";
foreach ( $terms as $t) {
        $sql .= "title LIKE '%$t%' AND ";
}

//removal of extra AND/space in foreach loop
$sql = rtrim($sql, "AND ");

//execute the query
$query = $conn->query($sql);

/*
//handling errors
if (!$query) {
    $error = "Selection Failed.". $conn->error;
    $conn->close();
    header("Location:error.php?m = $error");
    die();
}

*/

?>

<?php
if ($query->num_rows == 0) {
    echo "Your Search '$term' did not match any vacations in our inventory.";
    include '../hotspots.php';
    exit();
}

?>
	<div class="booklist">
        <div class="row header">
            <div class="col1">Product</div>
            <div class="col2">Type</div>
            <div class="col3">Price Per Person</div>
        </div>
		<!-- insert a row into the table for each book -->

        <?php
        while ($row = $query->fetch_assoc()) {
            ?>



            <div class="row">
                <div class="col1"><a href="../hotspots.php?id=<?= $row['id'] ?>"><?= $row['product'] ?></a></div>
                <div class="col2"><?= $row ['type'] ?></div>
                <div class="col3"><?= $row ['price_per_person'] ?></div>
            </div>


            <?php
        }
        ?>
