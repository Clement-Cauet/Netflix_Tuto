<?php

require_once '../../config/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name       = $_POST["name"];
    $password   = $_POST["password"];
    $admin      = isset($_POST['admin']) ? 1 : 0;

    $_SESSION['db']->createUser($name, $password, $admin);

    header('Location: ../../public/settings.php');
    exit;
}

?>