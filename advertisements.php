<?php
include_once "includes/class_autoloader.inc.php";
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>RabIT test</title>
</head>
<body>

<div class="container">
    <div class="center">
        <p>

            <table>
                <tr>
                    <td><a href = "index.php">Home</a></td><td><a href = "users.php">Users</a></td><td><a href = "advertisements.php"><b>Advertisements</b></a></td>
                </tr>
            </table>

            <?php
            $users = new UsersView();
            $usersController = new UsersController();

            //first checking if connecting to SQL is possible
            if ($users->isConnectedToSQL()){

                //if connected, checking if database exists
                if ($users->isDatabaseFound()){
                    //if database exists, shows the advertisers with the corresponding users
                    $users->showAdvertisementsWithUsers();
                }
                else {
                    //if database doesn't exist, tries to create it and populate it
                    echo "<p>Database not found<br></p>";
                    $usersController->setUpDatabaseAndPopulateItForDemo();

                    //if creating the database was successful, it shows the advertisers with the corresponding users
                    if ($users->isDatabaseFound()){
                        echo "<p>Database created<br></p>";
                        $users->showAdvertisementsWithUsers();
                    }
                    //if creating the database wasn't successful, prints it out
                    else {
                        echo "<p>Database couldn't be created<br></p>";
                    }
                }
            }
            ?>
        </p>
    </div>
</div>



</body>
</html>