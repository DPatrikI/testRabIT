<?php

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $databaseName = "rabitdatabase";
    //private $databaseName = "rabitdatabase";

    protected function connectToSQL(){
        $conn = new mysqli($this->host, $this->user, $this->password);
        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
            return false;
        }
        return $conn;
    }

    protected function connectToDatabase(){

        $result = mysqli_connect($this->host, $this->user, $this->password, $this->databaseName);

        return $result;
    }
}