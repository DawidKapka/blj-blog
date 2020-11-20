<?php 
    include("validation.php");
    include("logic.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("navbar.php");?>
    <div class="container">
        <div class="subnav">
        </div>
        <main class="main">
            <div class="content">
                <div class="main-box">
                    <div class="add-box">
                    <form action="index.php" method="post">
                        <p class="create-header">Create Post: </p>
                        <label for="name" class="name-input">Name:</label>
                        <input type="text" name="name" class="name-input" value="<?= $name?>"><br>

                        <textarea name="blog-input" cols="100" rows="5" class="blog-input" value="<?php?>"><?= $message?></textarea><br>
                        
                        <div class="img-box">
                            <label for="img" class="image-input">Image: </label>
                            <input type="text" name="img" class="image-input" placeholder="Paste URL here..."><br>
                        </div>
                        <input type="submit" value="Abschicken" class="post-button" name="submit-box">
                        </div>

                        <div class="message-box">
                            <?php
                            foreach($statements->fetchAll() as $statement) {
                                $name = $statement[1];
                                $date = $statement[2];
                                $message = $statement[3];
                                include("message-box.php");
                                
                            }
                            ?>
                        </div>
                        <?php 

                        if (isset($_POST["submit-box"])) {
                            if (isNameCorrect($name) === false && isMessageCorrect($message) === false) { 
                                echo '<div class=error-box><ul>';
                            
                                if (isNameCorrect($name) === false) {
                                    echo '<li>Geben sie einen gültigen Namen ein!</li>';
                                }
                                if (isMessageCorrect($message) === false) {
                                    echo '<li>Die Nachricht kann nicht leer sein!</li>';
                                }
                                echo '</ul></div>';
                            }
                            
                        }
                        ?>
                       
                    </form>

                </div>
            </div>

        </main>
    </div>
</body>
</html>