<?php

class UsersView extends Users {

    public function isConnectedToSQL(){
        $result = $this->connectToSQL();

        if ($result){
            return true;
        }
        return false;
    }

    public function isDatabaseFound(){
        $result = $this->connectToDatabase();

        if ($result){
            return true;
        }
        return false;
    }

    public function showUsers(){
        $result = $this->getUsers();
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo $row["name"] . "<br>";
            }
        }
    }

    public function showAdvertisements(){
        $result = $this->getAdvertisers();
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo $row["title"] . "<br>";
            }
        }
    }

    public function showAdvertisementsWithUsers(){
        $result = $this->getAdvertisersWithUsers();
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "Advertisements: " . $row["title"] . ", relataed user: " . $row["name"] . "<br>";
            }
        }
    }

}
