<?php

$result = $_SESSION['db']->getUsers();
$userArray = [];

foreach ($result as $user) {
    $userArray[] = $user;
}

?>

<div class="dasboard-content">
    <h2>Users</h2>
    <table class="form-dashboard">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Password</th>
            <th>Admin</th>
            <th>Action</th>
        </tr>
        <tr>
            <form method="post" action="../database/user/add.php">
                <td></td>
                <td><input type="text" name="name"></td>
                <td><input type="text" name="password"></td>
                <td><input type="checkbox" name="admin"></td>
                <td><input type="submit" value="Ajouter"></td>
            </form>
        </tr>
        <?php foreach ($userArray as $user) { ?>
            <tr>
                <form method="post" action="../database/user/update.php">
                    <td><?php echo $user->getId(); ?></td>
                    <td><input type="text" name="name" value="<?php echo $user->getName(); ?>"></td>
                    <td><input type="text" name="password" value="<?php echo $user->getPassword(); ?>"></td>
                    <td><input type="checkbox" name="admin" <?php echo $user->getAdmin() == "1" ? 'checked' : ''; ?>></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
                        <input type="submit" value="Modifier">
                    </td>
                </form>
                <form method="post" action="../database/user/delete.php">
                    <td>
                        <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
                        <input type="submit" value="Supprimer">
                    </td>
                </form>
            
        <?php } ?>
    </table>
</div>