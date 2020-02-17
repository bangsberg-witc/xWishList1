<?php include_once '../view/header.php'; 

?>

<h1>Mariah ASG08 User List</h1>

<h3>Search User</h3>
<form action="" method="post">
    <input type="hidden" name="controllerRequest" value="search_users"> 
    <label>First Name:</label>
    <input type="text" name="searchFirstName"><br>
    <label>Last Name:</label>
    <input type="text" name="searchLastName"><br>
    <input type="submit" name="search" value="Search">
</form>
<br><br>


<table>
    <tr>
        <th>ID</th>
        <th class="fullName">Full Name</th>
        <th>Email Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>IsActive</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>


    <?php $status = "" ?>

    <?php
    foreach ($users as $user) :

//        if ($user['isActive'] == 1)
//            $status = "Active";
//        else
//            $status = "Deleted";
        ?>
        <tr>
            <td><?php echo $user->getID(); ?></td>
            <td class="fullName"><?php echo $user->getFirstName() . ' ' . $user->getLastName(); ?></td>
            <td><?php echo $user->getEmail(); ?></td>
            <td><?php echo $user->getCity(); ?></td>
            <td><?php echo $user->getState(); ?></td>
            <td><?php echo $user->getZip(); ?></td>
            <td><?php echo $user->getStatus(); ?></td>
            <td><form action="" method="post">
                    <input type="hidden" name="controllerRequest"
                           value="edit_user">
                    <input type="hidden" name="user_id"
                           value="<?php echo $user->getID(); ?>">

                    <input type="submit" value="Edit">
                </form></td>
            <td><form action="" method="post">
                    <input type="hidden" name="controllerRequest"
                           value="delete_user">
                    <input type="hidden" name="user_id"
                           value="<?php echo $user->getID(); ?>">
                    <input type="submit" value="Delete">
                </form></td>
        </tr>
    <?php endforeach; ?>
</table>


<?php include_once '../view/footer.php'; ?>
<?php include_once '../model/showGetPostVariables.php'; ?>
<?php funShowAllPOSTandGETvariables(); ?>
