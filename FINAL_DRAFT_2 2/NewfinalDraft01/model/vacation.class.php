<?php
/*
* Author: Kailey Hart, Lauren Fasig, Tatiana Perry
* Date: 12-08-2020
* Name: vacation.class.php
* Description: Represents the real world Vacation
*/

class Vacation {

    //private data members
    private $vacation_id, $product, $location, $type, $price_per_person;

    //constructor
    public function __construct($vacation_id, $product, $location, $type, $price_per_person) {
        $this->vacation_id = $vacation_id;
        $this->product = $product;
        $this->location = $location;
        $this->type = $type;
        $this->price_per_person = $price_per_person;
    }

    //Getters
    public function getId() {
        return $this->vacation_id;
    }

    public function getProduct() {
        return $this->product;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getType() {
        return $this->type;
    }

    public function getPricePerPerson() {
        return $this->price_per_person;
    }

}