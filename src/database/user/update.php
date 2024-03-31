<?php

require_once '../../config/session.php';

if (!isset($_POST['verify_password'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id         = $_POST["id"];
        $name       = $_POST["name"];
        $password   = $_POST["password"];
        $admin      = isset($_POST['admin']) ? 1 : 0;
    
        $_SESSION['db']->updateUser($name, $password, $admin, $id);
    
        header('Location: ../../public/settings.php');
        exit;
    }
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id                 = $_POST["id"];
        $name               = $_POST["name"];
        $password           = $_POST["password"];
        $verify_password    = $_POST["verify_password"];
        $admin              = isset($_POST['admin']) ? 1 : 0;
    
        if ($password == $verify_password) {
            $_SESSION['db']->updateUser($name, $password, $admin, $id);
    
            header('Location: ../../public/settings.php');
            exit;
        } else {
            header('Location: ../../public/settings.php');
            exit;
        }
    }
}

?>