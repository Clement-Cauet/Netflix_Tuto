<?php

require_once '../config/session.php';

if (!isset($_SESSION['log'])) {
    header('Location: signin.php');
    exit;
}

include '../components/menu.html';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sun Carry</title>
        <link rel="stylesheet" type="text/css" href="../styles/menu.css">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
    </head>
    <body>
        <h1>SUN CARRY</h1>
        <div class="main-container">
            
        <?php

            include '../components/dashboard/account.php';

            if ($_SESSION['user']->getAdmin()) {
                include '../components/form/admin.html';

                include '../components/dashboard/user.php';
                include '../components/dashboard/movie.php';
                include '../components/dashboard/gender.php';
                include '../components/dashboard/author.php';

            }
        ?>
        </div>
    </body>
</html>