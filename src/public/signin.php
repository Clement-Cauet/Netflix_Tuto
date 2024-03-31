<?php

if (isset($_POST['register'])) {
    $username           = $_POST['username'];
    $password           = $_POST['password'];
    $verify_password    = $_POST['verify_password'];
    $admin              = isset($_POST['admin']) ? 1 : 0;

    // Vérifier si les champs du formulaire sont tous remplis
    if (!empty($username) && !empty($password) && !empty($verify_password)) {
        if ($password == $verify_password) {
            // Appeler la fonction createUser de $user
            // Assurez-vous que $_SESSION['user'] est correctement défini
            if (isset($_SESSION['user'])) {
                $_SESSION['user']->createUser($username, $password, $admin);
                $_SESSION['log'] = true;
                header('Location: movie.php');
                exit;
            }
        } else {
            echo '<p class="error-message">Les mots de passe ne correspondent pas</p>';
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
            require_once '../components/form/signin.html';
        ?>
    </body>
</html>