<?php

class UsersController extends Users {

    public function createDatabase(){
        $sql = "CREATE DATABASE rabitdatabase;";

        $result = $this->createDatabaseAt($sql);

        if ($result){

        }
        else {
            echo "Error creating database" . "<br>";
        }
    }

    public function createTables(){
        $result1 = $this->createUsersTable();
        $result2 = $this->createAdvertisementsTable();
    }

    public function addUser($name){
        $result = $this->insertIntoUsers($name);
        if ($result){
            //echo "Succesfully added " . $name . "<br>";
        }
        else{
            //echo "error adding user" . "<br>";
        }
    }

    public function addAdvertisement($title, $userid){
        $result = $this->insertIntoAdvertisements($title, $userid);
        if ($result){
            //echo "Succesfully added " . $title . " with userid " . $userid . "<br>";
        }
        else{
            //echo "error adding advertisement" . "<br>";
        }
    }

    public function populateDatabaseWithUsers(){
        $names = array("Jack", "John", "Jamie", "Jane", "Julie", "Jackson", "Joe", "Jacob", "Joshua", "Jayden", "Jasmine", "Joel", "Jack");
        foreach ($names as $name){
            $this->addUser($name);
        }
    }

    public function populateDatabaseWithAdvertisements(){
        $titles = array("Shoe", "Shelf", "Seat", "Sandpaper", "Shark");
        foreach ($titles as $title){
            $this->addAdvertisement($title, rand(1, 13));
        }
    }


    public function setUpDatabaseAndPopulateItForDemo(){
        $this->createDatabase();
        $this->createTables();
        $this->populateDatabaseWithUsers();
        $this->populateDatabaseWithAdvertisements();

    }




}
