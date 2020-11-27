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
                    <p class="header-text">Account Information</p><br>
                    <img src="../img/user-icon-big.png" alt="user-icon"><br>
                    <p class="acc-info">Username: <?= $GLOBALS['name'][1];?></p><br>
                    <p class="acc-info">Email: <?= $GLOBALS['name'][2];?></p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>