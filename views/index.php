<?php 
    session_start();
    include("../logic/validation.php");
    include("errors.php");
    include("../logic/comment-validation.php");
    include("../logic/registration-validation.php");
    include("../logic/logic.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
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
                        <form action="index.php" method="post">
                            <p class="header-text"><img src="../img/create-icon.png" alt="" class="icon"> Create Post:</p>
                            <label for="name" class="name-input">Name:</label>
                            <input type="text" name="name" class="name-input" value="<?= $name?>"><br>

                            <textarea name="blog-input" cols="100" rows="5" class="blog-input" value="<?php?>"><?= $message?></textarea><br>
                            
                            <div class="img-box">
                                <label for="img" class="image-input">Image: </label>
                                <input type="text" name="img" class="image-input" placeholder="Paste URL here..."><br>
                            </div>
                            <input type="submit" value="Send" class="post-button" name="login-box">
                            </div>
                            <?php 
                            if (isset($_POST["login-box"])) {
                                validateInput($name, $message);
                            }
                            ?>
                            <div class="message-box">
                                <?php
                                foreach($statements->fetchAll() as $statement) {
                                    $id = $statement[0];
                                    $name = $statement[1];
                                    $date = $statement[2];
                                    $message = $statement[3];
                                    $url = $statement[4];
                                    include("message-box.php");
                                    
                                }
                                ?>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
</html>