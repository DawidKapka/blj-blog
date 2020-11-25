<?php 
    include("../logic/validation.php");
    include("../logic/logic.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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
                        <p class="header-text">Other Blogs: </p> 
                        <div class="links">
                            <?php
                                foreach($sqlQuerry->fetchAll() as $url_statement) {
                                    $author = $url_statement[1];
                                    $url = $url_statement[2];
                                    echo '<div class="link">';
                                    echo $author . ":  ";
                                    echo "<a href=$url>";
                                        echo $url;
                                    echo "</a>";
                                    echo '</div>';
                                }
                            ?>
                        </div> 
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>