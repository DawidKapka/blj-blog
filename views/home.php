<?php 
    include("../logic/validation.php");
    include("errors.php");
    include("../logic/comment-validation.php");
    include("../logic/registration-validation.php");
    include("../logic/logic.php");

?>
    <?php include("header.php");?>
<body>
    <div class="container">
        <div class="subnav">
        </div>
        <main class="main">
            <div class="content">
                <div class="main-box">
                    <div class="add-box">
                        <form action="home.php" method="post">
                            <?php
                                if (isset($_SESSION['userid'])) {
                                    include('create-box.php');
                                } else {
                                    echo '<p class="header-text">Please <a href="login.php" class="login-text">login</a> to create Posts</p>';
                                }
                            ?>
                            </div>
                            <?php 
                            if (isset($_POST["login-box"])) {
                                validateInput($name, $message);
                            }
                            ?>
                            <div class="message-box">
                                <?php
                                foreach($statements->fetchAll() as $statement) {
                                    $GLOBALS['post_id'] = $statement[0];
                                    $post_name = $statement[1];
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