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
            <?php
            $users = new UsersView();
            $usersController = new UsersController();

            if ($users->isConnectedToSQL()){
                if ($users->isDatabaseFound()){
                    $users->showAdvertisementsWithUsers();
                }
                else {
                    echo "Database not found<br>";
                    $usersController->setUpDatabaseAndPopulateItForDemo();
                    if ($users->isDatabaseFound()){
                        echo "Database created<br>";
                        $users->showAdvertisementsWithUsers();
                    }
                    else {
                        echo "Database couldn't be created<br>";
                    }
                }
            }
            ?>
        </p>
    </div>
</div>



</body>
</html>