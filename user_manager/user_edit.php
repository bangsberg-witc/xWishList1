
<?php include_once '../view/header.php'; ?>

<h1>Demo ASG 10  Edit User</h1>

<form action="" method="POST">
    <input type="hidden" name="user_id"
           value="<?php echo $user->getID(); ?>">
    <label>First Name:</label>
    <input type="firstName" name="firstName"
           value="<?php echo $user->getFirstName(); ?>">
    <br>
    <label>Last Name:</label>
    <input type="lastName" name="lastName"
           value="<?php echo $user->getLastName(); ?>">
    <br>
    <label>Address:</label>
    <input type="address" name="address"
           value="<?php echo $user->getAddress(); ?>">
    <br>
    <label>City:</label>
    <input type="city" name="city"
           value="<?php echo $user->getCity(); ?>">
    <br>
    <label>State:</label>
    <input type="state" name="state"
           value="<?php echo $user->getState(); ?>">
    <br>
    <label>Zip Code:</label>
    <input type="postalCode" name="postalCode"
           value="<?php echo $user->getZip(); ?>">
    <br>
    <label>Email:</label>
    <input type="email" name="email"
           value="<?php echo $user->getEmail(); ?>">
    <br>
    <label>Password:</label>
    <input type="user_password" name="password"
           value="<?php echo $user->getPassword(); ?>">
    <br>
    <label>Status</label>
    <select name="isActive">
        <option value="<?php echo $user->getIsActive(); ?>">
            <?php echo $user->getStatus() ?>
        </option>
        <option><?php echo $user->getNotIsActive() ?></option>
    </select>
    <br>
    <input type="hidden" name="controllerRequest" value="update_user">
    <input type="submit" name="register" value="Save">
</form>

<h2 class="error"> <?php echo $error_message; ?></h2>

<?php include_once '../view/footer.php'; ?>
<?php include_once '../model/showGetPostVariables.php'; ?>
<?php funShowAllPOSTandGETvariables(); ?>
