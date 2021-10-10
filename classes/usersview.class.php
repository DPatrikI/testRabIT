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

    //shows the users in a table
    public function showUsers(){
        $result = $this->getUsers();
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){
            echo "<table>";
            echo "<tr><td><b>Users:</b></td></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["name"] . "</td></tr>";
            }
            echo "</table>";
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

    //shows the advertisements with the corresponding users in a table
    public function showAdvertisementsWithUsers(){
        $result = $this->getAdvertisersWithUsers();
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){
            echo "<table>";
            echo "<tr><td><b>Title</b></td><td><b>Related user</b></td></tr>";
            while ($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>" . $row["title"] . "</td><td>" . $row["name"] . "</td></tr>";
            }
            echo "</table>";
        }
    }

}
