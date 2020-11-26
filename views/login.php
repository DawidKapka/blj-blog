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
                            <?php 
                                if (!isset($_SESSION['userid'])) {
                                    include('login-box.php');
                                } else {
                                    echo '<p class="header-text">Login Successful! Redirecting to Main Page... </p>';
                                    header("Location: home.php");
                                }
                            ?>

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