<?php include("../logic/logic.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
        <nav class="navbar">
            <a href="index.php" class="nav-header" >BLJ-Blog</a>
            <a class="nav-text" href="index.php"><p class="nav-border">Blog</p></a>
            <a class="nav-text" href="other-blogs.php"><p class="nav-border">Other Blogs</p></a> 
            <?php
                if (isset($_SESSION['userid'])) {
                    echo '<a class="nav-text account-settings" href="account-settings.php"><p class="nav-border">Account Settings</p></a>';
                    echo '<form action="index.php" method="post">';
                        echo '<input type="submit" value="Logout" class="post-button logout-button" name="logout">';
                    echo '</form>';
                    if (isset($_POST['logout'])) {
                        session_destroy();
                    }
                } else {
                    
                    echo '<a class="nav-text" href="login.php"><p class="nav-border login-text">Login/Register<img src="../img/login-icon.png" alt="login icon" class="icon"></p></a>';
                }

            ?>      
        </nav>



</body>
</html>