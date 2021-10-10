<?php

class Dbh {
    //creating the variables that are necessary for connecting to the running MySQL
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $databaseName = "rabitdatabase";

    //$databaseName has a getter, so it can be modified without editing it in multiple places
    protected function getDatabaseName(){
        return $this->databaseName;
    }

    //function to connect only to the SQL
    protected function connectToSQL(){
        $conn = new mysqli($this->host, $this->user, $this->password);
        if ($conn->connect_error){
            die("<p>Connection failed: " . $conn->connect_error . "</p>");
            return false;
        }
        return $conn;
    }

    //function to connect to the database
    protected function connectToDatabase(){

        $result = mysqli_connect($this->host, $this->user, $this->password, $this->databaseName);

        return $result;
    }
}