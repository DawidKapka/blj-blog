<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
    <div class="blog-box">
        <div class="message-box">
            <p class="message-name"><?= $name ?></p>
            <p class="date"><?= $date?></p>
            <p class="message"><?= $message ?></p>
            <div class="add-comment">
            <input type="text" name="comment" class="comment-input" placeholder="Add Comment..."><br>
        </div>
            <div class="comments">

            </div>

        </div>
    </div>
</body>
</html>