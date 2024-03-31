<?php

require_once '../config/session.php';

if (!isset($_SESSION['log'])) {
    header('Location: signin.php');
    exit;
}

$movies = $_SESSION['db']->getMovies();
$movieArray = [];

foreach ($movies as $movie) {
    $movieArray[] = $movie;
}

// Filter movies based on search criteria
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = $_GET['search'];
    $filteredMovies = [];

    foreach ($movieArray as $movie) {
        if (stripos($movie->getTitle(), $search) !== false ||
            stripos($movie->getGender(), $search) !== false ||
            stripos($movie->getAuthor(), $search) !== false) {
            $filteredMovies[] = $movie;
        }
    }

    $movieArray = $filteredMovies;
}

require_once '../components/menu.html';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Movie</title>
        <link rel="stylesheet" type="text/css" href="../styles/menu.css">
        <link rel="stylesheet" type="text/css" href="../styles/searchbar.css">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
    </head>
    <body>
        <div class="main-container">
            <div class="header">
                <h1>SUN CARRY</h1>
                <form method="GET" class="search-form" action="">
                    <input type="text" name="search" class="search-input">
                    <i class="fa fa-search"></i>
                    <a href="movie.php" class="search-reset">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </form>
            </div>

            <div class="grid-container">
                <?php foreach ($movieArray as $movie) { ?>
                    <div class="grid-item">
                        <h2><?php echo $movie->getTitle(); ?></h2>
                        <div class="grid-description">
                            <p><?php echo $movie->getDescription(); ?></p>
                        </div>
                        <div class="grid-info">
                            <p><?php echo $movie->getGender(); ?></p>
                            <p><?php echo $movie->getAuthor(); ?></p>
                            <p><?php echo $movie->getDate(); ?></p>
                        </div>
                        <div style="text-align: right;">
                            <p><?php echo $movie->getScore(); ?> / 10</p>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </body>
</html>