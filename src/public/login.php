<?php

require_once '../config/session.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Vérifier si les champs du formulaire sont tous remplis
    if (!empty($username) && !empty($password)) {
        // Vérifier les informations avec la fonction login de $user
        // Assurez-vous que $_SESSION['user'] est correctement défini
        if (isset($_SESSION['user']) && $_SESSION['user']->login($username, $password)) {
            $_SESSION['log'] = true;
            $_SESSION['user_id'] = $_SESSION['user']->getId();
            // Rediriger vers movie.php
            header('Location: movie.php');
            exit;
        } else {
            echo '<p class="error-message">Identifiants invalides</p>';
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sun Carry</title>
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
    </head>
    <body>
        <h1>SUN CARRY</h1>
        <?php
            require_once '../components/form/login.html';
        ?>
    </body>
</html>