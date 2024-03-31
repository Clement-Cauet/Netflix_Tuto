<?php

    session_start();
    //session_destroy();

    define('ROOT_PATH', 'C:/wamp64/www/Sun_carry/');

    include ROOT_PATH . "src/database/database.php";
    include ROOT_PATH . "src/classes/user.php";
    include ROOT_PATH . "src/classes/movie.php";
    include ROOT_PATH . "src/classes/gender.php";
    include ROOT_PATH . "src/classes/author.php";

    $host   = "localhost";
    $dbname = "sun_carry";
    $login  = "root";
    $mdp    = "root";

    $_SESSION['db'] = new Database($host, $login, $mdp, $dbname);

    $_SESSION["user"]   = new User($_SESSION['db']);
    $_SESSION["movie"]  = new Movie($_SESSION['db']);
    $_SESSION["gender"] = new Gender($_SESSION['db']);
    $_SESSION["author"] = new Author($_SESSION['db']);

    if (isset($_SESSION["log"]) && $_SESSION["log"] == true){
        if(isset($_SESSION["user_id"])){
            $_SESSION["user"]->setUserById($_SESSION["user_id"]);
        }
    }

?>