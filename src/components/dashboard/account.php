<div class="dasboard-content">
    <h2>Mon compte</h2>
    <form method="post" class="form-dashboard" action="../database/update_user.php">
        <input type="text" name="name" value="<?php echo $_SESSION['user']->getName(); ?>">
        <input type="password" name="password" required>
        <input type="password" name="verify_password" required>
        <input type="checkbox" name="admin" <?php echo $_SESSION['user']->getAdmin() == "1" ? 'checked' : ''; ?>>
        <input type="hidden" name="id" value="<?php echo $_SESSION['user']->getId(); ?>">
        <input type="submit" value="Modifier">
    </form>
</div>