<?php 
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
    <title>Other Blogs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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
                        <div class="links">
                            <?php
                                foreach($sqlQuerry->fetchAll() as $url_statement) {
                                    $author = $url_statement[1];
                                    $url = $url_statement[2];
                                    echo '<div class="link"><ul>';
                                    echo '<li class="link-table">' . "<a href=" . htmlspecialchars($url) . ">";
                                        echo htmlspecialchars($author);
                                    echo "</a></li>";
                                    echo '</ul></div>';
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