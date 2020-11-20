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
                        <label for="name" class="name-input">Name:</label>
                        <input type="text" name="name" class="name-input" value="<?= $name?>"><br>

                        <textarea name="blog-input" cols="100" rows="5" class="blog-input" value="<?php?>"><?= $message?></textarea><br>
                        
                        <input type="submit" value="Abschicken" class="post-button" name="submit-box">
                        </div>

                        <?php 

                        if (isset($_POST["submit-box"])) {
                            if (isNameCorrect($name) === true && isMessageCorrect($message) === true) {
                                include("message-box.php");
                                
                                
                            } else {
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