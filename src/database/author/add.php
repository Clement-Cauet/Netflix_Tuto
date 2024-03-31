<?php

require_once '../../config/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];

    $_SESSION['db']->createAuthor($name);

    header('Location: ../../public/settings.php');
    exit;
}

?>