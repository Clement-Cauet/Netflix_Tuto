<?php

require_once '../../config/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id             = $_POST["id"];
    $title          = $_POST["title"];
    $description    = $_POST["description"];
    $author         = $_POST["author"];
    $gender         = $_POST["gender"];
    $date           = $_POST["date"];
    $score          = $_POST["score"];

    $_SESSION['db']->updateMovie($title, $description, $author, $gender, $date, $score, $id);

    header('Location: ../../public/settings.php');
    exit;
}

?>