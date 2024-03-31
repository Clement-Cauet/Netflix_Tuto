<?php

$result = $_SESSION['db']->getGenders();
$genderArray = [];

foreach ($result as $gender) {
    $genderArray[] = $gender;
}

?>

<div class="dasboard-content">
    <h2>Gender</h2>
    <table class="form-dashboard">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <tr>
            <form method="post" action="../database/gender/add.php">
                <td></td>
                <td><input type="text" name="name"></td>
                <td><input type="submit" value="Ajouter"></td>
            </form>
        </tr>
        <?php foreach ($genderArray as $gender) { ?>
            <tr>
                <form method="post" action="../database/gender/update.php">
                    <td><?php echo $gender->getId(); ?></td>
                    <td><input type="text" name="name" value="<?php echo $gender->getName(); ?>"></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $gender->getId(); ?>">
                        <input type="submit" value="Modifier">
                    </td>
                </form>
                <form method="post" action="../database/gender/delete.php">
                    <td>
                        <input type="hidden" name="id" value="<?php echo $gender->getId(); ?>">
                        <input type="submit" value="Supprimer">
                    </td>
                </form>
            
        <?php } ?>
    </table>
</div>