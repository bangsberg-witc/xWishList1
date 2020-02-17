<!DOCTYPE HTML>
<html>
    <head>
        <title>Demo WishList </title>
        <base href="http://localhost/Project2019/Demo-ASG12-WishList/">

        <link rel="stylesheet" type="text/css" href="styles/main.css">
    </head>

    <header>
        <nav>
            <ul>
                <li><a href="index.php">ASG 12 WishList</a></li>
                <li><a href="user_manager/?controllerRequest=login_user_form">Login</a></li>
                <li><a href="photo_manager/?controllerRequest=view_photo_form">Photo</a></li>
                <li><a href="user_manager/?controllerRequest=register_user_form">Register</a></li>
                <li><a href="user_manager/?controllerRequest=show_user_list_form">Users</a></li>
                <li><a href="user_manager/?controllerRequest=logOut">
                        <form action="" method="post">
                            <input type="hidden" name="controllerRequest" value="logOut">
                                Log Out
                        </form></a></li>
            </ul>
        </nav>
    </header>

    <body>
        <main>


