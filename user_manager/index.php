<?php
session_start();
require('../model/database.php');
require('../model/user_db.php');
require('../model/user.php');

$controllerChoice = filter_input(INPUT_POST, 'controllerRequest');
if ($controllerChoice == NULL) {
    $controllerChoice = filter_input(INPUT_GET, 'controllerRequest');
    if ($controllerChoice == NULL) {
        $controllerChoice = '';
    }
}
if ($controllerChoice == 'login_user_form') {
    $error_message = "";
    
    $email = filter_input(INPUT_COOKIE, 'email');
    $password = filter_input(INPUT_COOKIE, 'password');
    require_once("user_login.php");
    
} else if ($controllerChoice == 'user_process_login') {
    $error_message = "";
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    //validate inputs
    if ($email == null || $password == null) {
        $error_message = "Please enter a valid email and password";
        include('user_login.php');
    } else {
        $user = get_user_by_email_password($email, $password);
        $ID = $user['ID'];
        
        if ($ID > 0) {
            $ID = $user['ID'];
            $email = $user['emailAddress'];
            $password = $user['password'];
            $userName = $user['firstName'] . ' ' . $user['lastName'];
            $_SESSION['UserID'] = $ID;
            $_SESSION['User'] = $userName;
             setCookie('email',$email);
             setCookie('password',$password);

            
            $user = get_user_by_id($ID);
            $login_message = "Login Succesful";
            $isActiveStatus = $user['isActive'];

            if ($user['isActive'] == 1) {
                $isActiveStatus = "Active";
                $isOtherActiveOption = "Deleted";
            } else {
                $isActiveStatus = "Deleted";
                $isOtherActiveOption = "Active";
            }

            include('user_edit.php');
        } else {
            $error_message = "Incorrect email or password";
            include('user_login.php');
        }
    }
    
} else if ($controllerChoice == 'view_photo_form') {
    $error_message = "";
    require_once("../photo_manager/photo_view.php");
    
} else if ($controllerChoice == 'register_user_form') {
    $error_message = "";
    require_once "user_register.php";
    
} else if ($controllerChoice == 'show_user_list_form') {
    $error_message = "";
    $users = UserDB::getAllUsers();
    require_once "user_list.php";
    
} else if ($controllerChoice == 'edit_user') {
    $user_id = filter_input(INPUT_POST, 'user_id');
    $user = UserDB::get_user_by_id($user_id);
    $error_message = "";
    //$isActiveStatus = "";

//    if ($user['isActive'] == 1) {
//        $isActiveStatus = "Active";
//        $isOtherActiveOption = "Deleted";
//    } else {
//        $isActiveStatus = "Deleted";
//        $isOtherActiveOption = "Active";
//    }

    include('user_edit.php');
    
} else if ($controllerChoice == 'update_user') {
    $user_id = filter_input(INPUT_POST, 'user_id');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $postalCode = filter_input(INPUT_POST, 'postalCode');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $isActive = filter_input(INPUT_POST, 'isActive');

    if ($isActive == "Active") {
        $isActive = "1";
    } else {
        $isActive = "2";
    }

    if ($firstName == NULL || $lastName == FALSE || $address == NULL ||
            $city == NULL || $state == NULL || $postalCode == NULL ||
            $email == NULL || $password == NULL || $isActive == NULL) {
        $error = "Invalid user data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_user($user_id, $firstName, $lastName, $address, $city, $state, $postalCode, $email, $password, $isActive);
    }
    $users = getAllUsers();

    require_once "user_list.php";
    
} else if ($controllerChoice == 'delete_user') {
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);

    if ($user_id == NULL || $user_id == FALSE) {
        $error = "Missing or incorrect user id";
        include('../errors/error.php');
    } else {
        delete_user($user_id);
    }

    $users = getAllUsers();
    require_once "user_list.php";
    
} else if ($controllerChoice == 'add_user') {
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $postalCode = filter_input(INPUT_POST, 'postalCode');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if ($firstName == NULL || $lastName == FALSE || $address == NULL ||
            $city == NULL || $state == NULL || $postalCode == NULL ||
            $email == NULL || $password == NULL) {
        $error = "Invalid user data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        add_user($firstName, $lastName, $address, $city, $state, $postalCode, $email, $password);
    }

    $users = getAllUsers();
    require_once "user_list.php";
    
} else if ($controllerChoice == 'search_users') {
    $searchFirstName = filter_input(INPUT_POST, 'searchFirstName');
    $searchLastName = filter_input(INPUT_POST, 'searchLastName');
    $users = search_users($searchFirstName, $searchLastName);

    require_once "user_list.php";
    
}else if($controllerChoice == "logOut"){
    session_destroy();
    require_once "../index.php";
}
?>