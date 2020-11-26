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
                        <form action="register.php" method="post">
                            <p class="header-text">Register</p>
                            
                        
                            <label for="name" class="name-input">Username:</label><br>
                            <input type="text" name="name" class="name-input"><br>
                            <label for="email" class="name-input">E-Mail:</label><br>
                            <input type="email" name="email" class="name-input"></br>
                            <label for="password" class="name-input">Password:</label><br>
                            <input type="password" name="password" class="name-input"><br>
                            <label for="password-repeat" class="name-input">Repeat Password: </label><br>
                            <input type="password" name="password-repeat" class="name-input"><br>


                            <input type="submit" value="Register" class="post-button" name="register-box">

                            <p class="date">Already have an Account? <a href="login.php">Login</a></a></p>

                            <?php
                                if (isset($_POST["register-box"])) {
                                    validateRegister($name_register, $email, $password, $password_repeat);
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