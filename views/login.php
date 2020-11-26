<?php 
    include("../logic/validation.php");
    include("../logic/comment-validation.php");
    include("../logic/registration-validation.php");
    include("../logic/logic.php");
    include("errors.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php include("header.php");?>
    <div class="container">
        <div class="subnav">
        </div>
        <main class="main">
            <div class="content">
                <div class="main-box">
                    <div class="add-box">
                        <form action="login.php" method="post">
                            <p class="header-text">Login</p>
                            
                        
                            <label for="name" class="name-input">Username/Email:</label><br>
                            <input type="text" name="name" class="name-input"><br>
                            <label for="name" class="name-input">Password:</label><br>
                            <input type="password" name="password" class="name-input"><br>

                            <input type="submit" value="Login" class="post-button" name="login-box">

                            <p class="date">No Account yet? <a href="register.php"> Register</a></a></p>

                            <?php
                                if(isset($_POST["login-box"])) {
                                    $name = $_POST["name"] ?? '';
                                    $password = $_POST["password"] ?? '';                             
                                } 
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>