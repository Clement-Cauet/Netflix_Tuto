<?php

require_once '../config/session.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['log'])) {
    
    header('Location: login.php');
    exit;

} else {

    header('Location: movie.php');
    exit;

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sun Carry</title>
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
    </head>
    <body>
    </body>
</html>