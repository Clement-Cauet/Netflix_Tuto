<?php

require_once '../../config/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id         = $_POST["id"];
    $name       = $_POST["name"];

    $_SESSION['db']->updateGender($name, $id);

    header('Location: ../../public/settings.php');
    exit;
}

?>