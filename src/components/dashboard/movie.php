<?php

$result = $_SESSION['db']->getMovies();
$movieArray = [];

foreach ($result as $movie) {
    $movieArray[] = $movie;
}

?>

<div class="dasboard-content">
    <h2>Movies</h2>
    <table class="form-dashboard">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Author</th>
            <th>Gender</th>
            <th>Date</th>
            <th>Score</th>
            <th>Action</th>
        </tr>
        <tr>
            <form method="post" action="../database/movie/add.php">
                <td></td>
                    <td><input type="text" name="title"></td>
                    <td><input type="text" name="description"></td>
                    <?php
                    $authors = $_SESSION['db']->getAuthors();
                    foreach ($authors as $author) {
                        $authorArray[] = $author;
                    }
                    ?>
                    <td>
                    <select name="author">
                        <?php foreach ($authorArray as $author) { ?>
                            <option value="<?php echo $author->getId();?>">
                                <?php echo $author->getName(); ?>
                            </option>
                        <?php } ?>
                    </select>
                    </td>
                    <?php
                    $genders = $_SESSION['db']->getGenders();
                    foreach ($genders as $gender) {
                        $genderArray[] = $gender;
                    }
                    ?>
                    <td>
                    <select name="gender">
                        <?php foreach ($genderArray as $gender) { ?>
                            <option value="<?php echo $gender->getId();?>">
                                <?php echo $gender->getName(); ?>
                            </option>
                        <?php } ?>
                    </select>
                    </td>
                    <td><input type="date" name="date"></td>
                    <td><input type="number" name="score"></td>
                <td><input type="submit" value="Ajouter"></td>
            </form>
        </tr>
        <?php foreach ($movieArray as $movie) { ?>
            <tr>
                <form method="post" action="../database/movie/update.php">
                    <td><?php echo $movie->getId(); ?></td>
                    <td><input type="text" name="title" value="<?php echo $movie->getTitle(); ?>"></td>
                    <td><input type="text" name="description" value="<?php echo $movie->getDescription(); ?>"></td>
                    <?php
                    $authors = $_SESSION['db']->getAuthors();
                    foreach ($authors as $author) {
                        $authorArray[] = $author;
                    }
                    ?>
                    <td>
                    <select name="author">
                        <?php foreach ($authorArray as $author) { ?>
                            <option value="<?php echo $author->getId(); ?>" <?php if ($author->getName() == $movie->getAuthor()) echo "selected"; ?>>
                                <?php echo $author->getName(); ?>
                            </option>
                        <?php } ?>
                    </select>
                    </td>
                    <?php
                    $genders = $_SESSION['db']->getGenders();
                    foreach ($genders as $gender) {
                        $genderArray[] = $gender;
                    }
                    ?>
                    <td>
                    <select name="gender">
                        <?php foreach ($genderArray as $gender) { ?>
                            <option value="<?php echo $gender->getId(); ?>" <?php if ($gender->getName() == $movie->getGender()) echo "selected"; ?>>
                                <?php echo $gender->getName(); ?>
                            </option>
                        <?php } ?>
                    </select>
                    </td>
                    <td><input type="date" name="date" value="<?php echo $movie->getDate(); ?>"></td>
                    <td><input type="number" name="score" value="<?php echo $movie->getScore(); ?>"></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $movie->getId(); ?>">
                        <input type="submit" value="Modifier">
                    </td>
                </form>
                <form method="post" action="../database/movie/delete.php">
                    <td>
                        <input type="hidden" name="id" value="<?php echo $movie->getId(); ?>">
                        <input type="submit" value="Supprimer">
                    </td>
                </form>
            
        <?php } ?>
    </table>
</div>