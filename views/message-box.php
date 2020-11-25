
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
    <div class="blog-box">
        <div class="message-text-box">
            <p class="message-name"><?= htmlspecialchars($name) ?></p>
            <p class="date"><?= htmlspecialchars($date)?></p>
            <p class="message"><?= htmlspecialchars($message) ?></p>
            <img src="<?= htmlspecialchars($url)?>" alt="<?= htmlspecialchars($url)?>">
            
            <div class="add-comment">
                <input type="text" name="comment" class="comment-input" placeholder="Add Comment..." submit=""><br>
                <input type="submit" value="Add Comment" class="post-button small-button" c name="submit-box">
            </div>
            <div class="comments">

            </div>

        </div>
    </div>
    <?php $image = '';?>
</body>
</html>