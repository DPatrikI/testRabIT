<?php

class UsersController extends Users {

    //function that creates the database specified in dbh.class.php
    public function createDatabase(){
        $databaseName = $this->getDatabaseName();
        $sql = "CREATE DATABASE $databaseName;";

        $result = $this->createDatabaseAt($sql);

        if ($result){
            return true;
        }
        else {
            echo "<p>Error creating database" . "<br></p>";
            return false;
        }
    }

    //function to create the two tables
    public function createTables(){
        $result1 = $this->createUsersTable();
        $result2 = $this->createAdvertisementsTable();
    }

    //function to add user with the desired name
    public function addUser($name){
        $result = $this->insertIntoUsers($name);
        if ($result){
            //echo "Succesfully added " . $name . "<br>";
        }
        else{
            //echo "error adding user" . "<br>";
        }
    }

    //function to add advertisement with the desired title and the corresponding user's id
    public function addAdvertisement($title, $userid){
        $result = $this->insertIntoAdvertisements($title, $userid);
        if ($result){
            //echo "Succesfully added " . $title . " with userid " . $userid . "<br>";
        }
        else{
            //echo "error adding advertisement" . "<br>";
        }
    }

    //function to populate the database with predefined names
    public function populateDatabaseWithUsers(){
        $names = array("Jack", "John", "Jamie", "Jane", "Julie", "Jackson", "Joe", "Jacob", "Joshua", "Jayden", "Jasmine", "Joel", "Jack");
        foreach ($names as $name){
            $this->addUser($name);
        }
    }

    //function to populate the database with predefined advertisements
    public function populateDatabaseWithAdvertisements(){
        $titles = array("Shoe", "Shelf", "Seat", "Sandpaper", "Shark");
        foreach ($titles as $title){
            //the id is random for each one
            $this->addAdvertisement($title, rand(1, 13));
        }
    }

    //function that calls all the necessary functions to create the demo database when it's not found
    public function setUpDatabaseAndPopulateItForDemo(){
        $this->createDatabase();
        $this->createTables();
        $this->populateDatabaseWithUsers();
        $this->populateDatabaseWithAdvertisements();

    }




}
