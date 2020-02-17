
<?php include_once '../view/header.php'; ?>

<h1>Mariah ASG08 Login</h1>

<form action="" method="POST">
    <input type="hidden" name="controllerRequest" value="user_process_login">
    <label>Email:</label>
    <input type="text" name="email" value= "<?php echo $email ?>">
    <br>
    <label>Password:</label>
    <input type="password" name="password" value="<?php echo $password ?>">
    <br>
    <input type="submit" name="login" value="Login">
</form>

<h2 class="error"> <?php echo $error_message; ?></h2>

<?php include_once '../view/footer.php'; ?>
<?php include_once '../model/showGetPostVariables.php'; ?>
<?php funShowAllPOSTandGETvariables(); ?>