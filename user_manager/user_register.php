
<?php include_once '../view/header.php'; ?>

<h1>Mariah ASG08 Register</h1>

<form action="" method="POST">

    <label>First Name:</label>
    <input type="text" name="firstName">
    <br>
    <label>Last Name:</label>
    <input type="text" name="lastName">
    <br>
    <label>Address:</label>
    <input type="text" name="address">
    <br>
    <label>City:</label>
    <input type="text" name="city">
    <br>
    <label>State:</label>
    <input type="text" name="state">
    <br>
    <label>Zip Code:</label>
    <input type="text" name="postalCode">
    <br>
    <label>Email:</label>
    <input type="text" name="email">
    <br>
    <label>Password:</label>
    <input type="text" name="password">
    <br>
    <input type="hidden" name="controllerRequest" value="add_user">
    <input type="submit" name="register" value="Register">
</form>

<h2 class="error"> <?php echo $error_message; ?></h2>

<?php include_once '../view/footer.php'; ?>
<?php include_once '../model/showGetPostVariables.php'; ?>
<?php funShowAllPOSTandGETvariables(); ?>