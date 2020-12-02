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
                            if (!isset($_POST['change-username']) && !isset($_POST['change-email'])) {
                                echo '<form action="home.php" method="post">';
                                echo '<p class="acc-info">Username:' . $GLOBALS['name'][1] . '</p>';
                                echo '<input type="submit" value="Change Username" class="post-button" name="change-username">';
                                echo '<p class="acc-info">Email: ' . $GLOBALS['name'][2] . '</p>';
                                echo '<input type="submit" value="Change Email" class="post-button" name="change-email">';
                                echo '</form>';
                            } else if (isset($_POST['change-username'])) {
                                echo '<form action="home.php" method="post">';
                                echo '<p class="acc-info">New Username: ';
                                echo '<textarea cols="25" rows="1" name="username-changed" class="new-name-input"></textarea>';
                                echo '</p>';
                                echo '<input type="submit" value="Save" class="post-button" name="save-username">';
                                echo '</form>';
                            } else {
                                echo '<form action="home.php" method="post">';
                                echo '<p class="acc-info">New Email: ';
                                echo '<textarea cols="25" rows="1" name="email-changed" class="new-name-input"></textarea>';
                                echo '</p>';
                                echo '<input type="submit" value="Save" class="post-button" name="save-email">';
                                echo '</form>';
                            }
                            if (isset($_POST['save-username'])) {
                                validateName($_POST['username-changed']);
                                if (isNameCorrect($_POST['username-changed']) === true) {
                                    $change_username = $pdo->prepare("UPDATE users SET username = :new_username WHERE id_user = :id_user");
                                    $change_username->execute([':id_user' => $_SESSION['userid'], ':new_username' => $_POST['username-changed']]);
                                    header("Location: account-settings.php");
                                }
                            }
                            if (isset($_POST['save-email'])) {
                                validateEmail($_POST['email-changed']);
                                if (isEmailCorrect($_POST['email-changed']) === true) {
                                    $change_username = $pdo->prepare("UPDATE users SET email = :new_email WHERE id_user = :id_user");
                                    $change_username->execute([':id_user' => $_SESSION['userid'], ':new_email' => $_POST['email-changed']]);
                                    header("Location: account-settings.php");
                                }
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