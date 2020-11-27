<?php include("../logic/logic.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
        <nav class="navbar">
            <a href="home.php" class="nav-header" >BLJ-Blog</a>
            <a class="nav-text account-settings" href="home.php"><p class="nav-border"><img class="" src="../img/blog.png" alt="user-icon"><br>Blog</p></a>
            <a class="nav-text account-settings" href="other-blogs.php"><p class="nav-border"><img class="user-img" src="../img/other-blogs.png" alt="user-icon"><br>Other Blogs</p></a>
            <?php
                if (isset($_SESSION['userid'])) {
                    $user_name = $GLOBALS['name'][1];
                    echo '<a class="nav-text account-settings" href="account-settings.php"><p class="nav-border"><img class="user-img" src="../img/user-icon.png" alt="user-icon"><br>' . htmlspecialchars($user_name) . '</p></a>';
                    echo '<form action="home.php" method="post">';
                        echo '<input type="submit" value="Logout" class="post-button logout-button" name="logout">';
                    echo '</form>';
                    if (isset($_POST['logout'])) {
                        session_destroy();
                        header('Location: home.php');
                    }
                } else {
                    
                    echo '<a class="nav-text" href="login.php"><p class="nav-border login-text"><img src="../img/login-icon.png" class="user-img" alt="login icon" class="icon"><br>Login/Register</p></a>';
                }

            ?>      
        </nav>



</body>
</html>