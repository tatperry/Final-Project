<?php
/* Authors: Kailey Hart, Tatiana Perry, Lauren Fasig
 * Date: 12-08-2020
 * Name: vacation_index_view.class.php
 * Description: Parent class for the vacations
 */

class VacationIndexView extends IndexView {
    public function display($vacations) {
        //display the page header
        require_once 'includes/header.php';
        require_once 'includes/database.php';
        ?>
        <div>


        <?php
        if($vacations ) {
            echo "No vacation was found";
        } else {
            //displays vacations in a grid; six vacations per row
            foreach ($vacations as $i => $vacation) {
                $vacation_id = $vacation->getId();
                $product = $vacation->getProducts();
                $location = $vacation->getLocation();
                $type = $vacation->getType();
                $price_per_person = $vacation->getPricePerPerson();
            }
            echo "<div > <p><a href='", BASE_URL, "/vacation/view/$vacation_id'></a><span>$product<br>Rated $location<br>  $type<br>  $price_per_person<br> </span></p></div>";
        }

        ?>
        </div>
        <a href="<?= BASE_URL ?>/vacation/index">Go to movie list</a>
<?php
        //display the page footer
        require_once 'includes/footer.php';

    }//end of display method
}