<?php

require_once '../../config/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    
    $_SESSION['db']->deleteAuthor($id);

    header('Location: ../../public/settings.php');
    exit;
}

?>