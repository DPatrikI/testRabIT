<?php
include_once "includes/class_autoloader.inc.php";
?>


<!DOCTYPE html>
<html>
<head>
    <title>RabIT test</title>
</head>
<body>

<?php
    $users = new UsersView();
    $usersController = new UsersController();

    if ($users->isConnectedToSQL()){
        if ($users->isDatabaseFound()){
            $users->showUsers();
        }
        else {
            echo "Database not found<br>";
            $usersController->setUpDatabaseAndPopulateItForDemo();
            if ($users->isDatabaseFound()){
                echo "Database created<br>";
                $users->showUsers();
            }
            else {
                echo "Database couldn't be created<br>";
            }
        }
    }
?>

</body>
</html>