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
    <title>Settings</title>
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
                    <form action="account-settings.php" method="post">
                        <p class="header-text">Account Information</p><br>
                        <img src="../img/user-icon-big.png" alt="user-icon"><br>
                        <?php
                            if (!isset($_POST['change-username'])) {
                                echo '<p class="acc-info">Username:' . $GLOBALS['name'][1] . '</p>';
                                echo '<input type="submit" value="Change Username" class="post-button" name="change-username">';
                            } else {
                                echo '<p class="acc-info">Username: <textarea cols="20" rows="1" name="username-changed>' . $GLOBALS['name'] . '</textarea></p>';
                                echo '<input type="submit" value="Save" class="post-button" name="change-username">';
                                
                                if (isset($_POST['change-username'])) {
                                    $new_username = $_POST["username-changed"];
                                    $change_username = $pdo->prepare("INSERT INTO `users` (id_user, username) WHERE (id_user = :id_user AND username = :username) VALUES (:new_username)");
                                    $change_username->execute([':id_user' => $_SESSION['userid'], ':username' => $GLOBALS['name'][1], ':new_username' => $new_username]);
                                }

                            }
                        ?>

                        <p class="acc-info">Email: <?= $GLOBALS['name'][2];?></p>
                        <input type="submit" value="Change Email" class="post-button" name="register-box">
                    </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>