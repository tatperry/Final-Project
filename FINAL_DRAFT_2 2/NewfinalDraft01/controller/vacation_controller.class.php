<?php
/* Authors: Kailey Hart, Tatiana Perry, Lauren Fasig
 * Date: 12-08-2020
 * Name: vacation_controller.class.php
 * Description: Vacation Controller
 */

class VacationController {
    private $vacation_model;

    //constructor
    public function __construct() {
        //create an instance of the VacationModel Class
        $this->vacation_model = VacationModel::getVacationModel();
    }

    //index action that displays all vacations
    public function index() {
        //retrieve all movies and store them in an array
        $vacations = $this->vacation_model_model->list_vacations();

        if (!$vacations) {
            //display an error
            $message = "There was a problem displaying vacations.";
            $this->error($message);
            return;
        }

        // display all vacations
        $view = new VacationIndexView();
        $view->display($vacations);
    }

    //Show details of vacations
    public function detail($vacation_id) {}

    //display a vacation in a form for editing

    //update a vacation in the database

    //Search Vacations
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all vacations
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching movies
        $vacations = $this->vacation_model->search_vacation($query_terms);

        if ($vacations === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched movies
        $search = new VacationSearch();
        $search->display($query_terms, $vacations);
    }

    //AutoSuggestion?

    //Handle Errors

    //Handle Calling Inaccessible Methods?
}