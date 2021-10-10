<?php

class Users extends Dbh {



    protected function getUsers(){
        $sql = "SELECT * FROM users;";
        $result = mysqli_query($this->connectToDatabase(), $sql);
        return $result;
    }

    protected function getAdvertisers(){
        $sql = "SELECT * FROM advertisements;";
        $result = mysqli_query($this->connectToDatabase(), $sql);
        return $result;
    }

    protected function getAdvertisersWithUsers(){
        $sql = "SELECT * FROM users JOIN advertisements ON users.id = advertisements.id;";
        $result = mysqli_query($this->connectToDatabase(), $sql);
        return $result;
    }

    protected function createDatabaseAt($sql){
        $result = mysqli_query($this->connectToSQL(), $sql);
        return $result;
    }

    protected function createUsersTable(){
        $sql = "CREATE TABLE users ( id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50) );";
        $result = mysqli_query($this->connectToDatabase(), $sql);
        return $result;
    }
    protected function createAdvertisementsTable(){
        $sql = "CREATE TABLE advertisements ( id INT PRIMARY KEY AUTO_INCREMENT, userid INT, title VARCHAR(50), FOREIGN KEY (userid) REFERENCES users(id) );";
        $result = mysqli_query($this->connectToDatabase(), $sql);
        return $result;
    }

    protected function insertIntoUsers($name){
        $sql = "INSERT INTO users(name) VALUES ('$name');";
        $result = mysqli_query($this->connectToDatabase(), $sql);
        return $result;
    }

    protected function insertIntoAdvertisements($title, $userid){
        $sql = "INSERT INTO advertisements(title, userid) SELECT '$title', id FROM users WHERE id = '$userid' LIMIT 1;";
        $result = mysqli_query($this->connectToDatabase(), $sql);
        return $result;
    }


}