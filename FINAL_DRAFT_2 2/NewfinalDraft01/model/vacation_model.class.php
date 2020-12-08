<?php
/* Authors: Kailey Hart, Tatiana Perry, Lauren Fasig
 * Date: 12-08-2020
 * Name: vacation_model.class.php
 * Description: The Vacation Model
 */

class VacationModel {

    //Private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblVacation;

    //Singleton Constructor
    private function  __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblVacation = $this->db->getVacationTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static mehtod to ensure there is just one VacationModel instance
    public static function getVacationModel() {
        if(self::$_instance == NULL) {
            self::$_instance == new VacationModel();
        }
        return self::$_instance;
    }

    //List Vacation Method
    public function list_vacation() {

        $sql = "SELECT * FROM " . $this->tblVacation .
            " WHERE " . $this->tblVacation;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned vacations
        $vacations= array();

        //loop through all rows in the returned records
        while ($obj = $query->fetch_object()) {
            $vacation = new Vacation(stripslashes($obj->product), stripslashes($obj->location), stripslashes($obj->type), stripslashes($obj->price_per_person));

            //set the id for the vaction
            $vacation->setId($obj->vaction_id);

            //add the movie into the array
            $vacations[] = $vacation;
        }
        return $vacations;
    }

    //View Vacation Method retrieves the details of the vacation specified by its id and returns an object

    //Update Vacation Method

    //Search Vacation Method checks the database for matches in product names.
    public function search_vacation($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array

        //select statement for AND serach
        $sql = "SELECT * FROM " . $this->tblVacation .
            " WHERE " . $this->tblVacation;

        //execute the query
        $query = $this->dbConnection->query($sql);

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 movie found.
        //create an array to store all the returned movies
        $vacations = array();

        //loop through all rows in the returned records
        while ($obj = $query->fetch_object()) {
            $vacation = new Vacation($obj->product, $obj->location, $obj->type, $obj->price_per_person);

            //set the id for the vacation
            $vacation->setId($obj->vaction_id);

            //add the movie into the array
            $vacations[] = $vacation;
        }
        return $vacations;
    }
}