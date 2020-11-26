<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  
    <div class="blog-box">
        <div class="message-text-box">
            <?php include("upvote_downvote.php");?>
            <p class="message-name"><?= htmlspecialchars($name) ?></p>
            <p class="date"><?= htmlspecialchars($date)?></p>
            <p class="message"><?= htmlspecialchars($message) ?></p>
            <img src="<?= htmlspecialchars($url)?>" alt="<?= htmlspecialchars($url)?>">
            
            <div class="add-comment">
                <input type="text" name="comment-name" class="comment-input" placeholder="Name: " submit=""><br>
                <input type="text" name="comment" class="comment-input" placeholder="Add Comment..." submit=""><br>
                <input type="submit" value="Add Comment" class="post-button small-button" c name="submit-comment-box">
            </div>
            <form action="index.php" method="post">
                <div class="comments">
                <?php
                    if (isset($_POST['submit-comment-box'])) {
                        validateComment($comment_name, $comment);
                    }
                ?>
                </div>
            </form>

        </div>
    </div>
    <?php $image = '';?>
</body>
</html>